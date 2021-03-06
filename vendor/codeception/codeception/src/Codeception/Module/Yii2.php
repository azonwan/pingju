<?php
namespace Codeception\Module;

use Codeception\Exception\ModuleConfigException;
use Codeception\Lib\Framework;
use Codeception\Lib\Interfaces\ActiveRecord;
use Codeception\Lib\Interfaces\PartedModule;
use Yii;

/**
 * This module provides integration with [Yii framework](http://www.yiiframework.com/) (2.0).
 *
 *
 * ## Config
 *
 * * configFile *required* - the path to the application config file
 *
 * The entry script must return the application configuration array.
 *
 * You can use this module by setting params in your functional.suite.yml:
 * <pre>
 * class_name: TestGuy
 * modules:
 *     enabled:
 *         - Yii2:
 *             configFile: '/path/to/config.php'
 * </pre>
 *
 * ## Parts
 *
 * * ORM - include only haveRecord/grabRecord/seeRecord/dontSeeRecord actions
 *
 *
 * ## Status
 *
 * Maintainer: **qiangxue**
 * Stability: **stable**
 *
 */
class Yii2 extends Framework implements ActiveRecord, PartedModule
{
    /**
     * Application config file must be set.
     * @var array
     */
    protected $config = ['cleanup' => false];
    protected $requiredFields = ['configFile'];
    protected $transaction;

    public $app;

    public function _initialize()
    {
        if (!is_file(\Codeception\Configuration::projectDir() . $this->config['configFile'])) {
            throw new ModuleConfigException(__CLASS__, "The application config file does not exist: {$this->config['configFile']}");
        }
    }

    public function _before(\Codeception\TestCase $test)
    {
        $this->client = new \Codeception\Lib\Connector\Yii2();
        $this->client->configFile = \Codeception\Configuration::projectDir().$this->config['configFile'];
        $mainConfig = \Codeception\Configuration::config();
        if (isset($mainConfig['config']) && isset($mainConfig['config']['test_entry_url'])){
            $this->client->setServerParameter('HTTP_HOST', (string) parse_url($mainConfig['config']['test_entry_url'], PHP_URL_HOST));
            $this->client->setServerParameter('HTTPS', ((string) parse_url($mainConfig['config']['test_entry_url'], PHP_URL_SCHEME)) === 'https');
        }
        $this->app = $this->client->startApp();

        if ($this->config['cleanup'] and isset($this->app->db)) {
            $this->transaction = $this->app->db->beginTransaction();
        }
    }

    public function _after(\Codeception\TestCase $test)
    {
        $_SESSION = [];
        $_FILES = [];
        $_GET = [];
        $_POST = [];
        $_COOKIE = [];
        $_REQUEST = [];
        if ($this->transaction and $this->config['cleanup']) {
            $this->transaction->rollback();
        }

        if (Yii::$app) {
            Yii::$app->session->destroy();
        }

        parent::_after($test);
    }

    public function _parts()
    {
        return ['orm'];
    }

    /**
     * Inserts record into the database.
     *
     * ``` php
     * <?php
     * $user_id = $I->haveRecord('app\models\User', array('name' => 'Davert'));
     * ?>
     * ```
     *
     * @param $model
     * @param array $attributes
     * @return mixed
     * @part orm
     */
    public function haveRecord($model, $attributes = [])
    {
        /** @var $record \yii\db\ActiveRecord  * */
        $record = $this->getModelRecord($model);
        $record->setAttributes($attributes, false);
        $res = $record->save(false);
        if (!$res) {
            $this->fail("Record $model was not saved");
        }

        return $record->primaryKey;
    }

    /**
     * Checks that record exists in database.
     *
     * ``` php
     * $I->seeRecord('app\models\User', array('name' => 'davert'));
     * ```
     *
     * @param $model
     * @param array $attributes
     * @part orm
     */
    public function seeRecord($model, $attributes = [])
    {
        $record = $this->findRecord($model, $attributes);
        if (!$record) {
            $this->fail("Couldn't find $model with " . json_encode($attributes));
        }
        $this->debugSection($model, json_encode($record));
    }

    /**
     * Checks that record does not exist in database.
     *
     * ``` php
     * $I->dontSeeRecord('app\models\User', array('name' => 'davert'));
     * ```
     *
     * @param $model
     * @param array $attributes
     * @part orm
     */
    public function dontSeeRecord($model, $attributes = [])
    {
        $record = $this->findRecord($model, $attributes);
        $this->debugSection($model, json_encode($record));
        if ($record) {
            $this->fail("Unexpectedly managed to find $model with " . json_encode($attributes));
        }
    }

    /**
     * Retrieves record from database
     *
     * ``` php
     * $category = $I->grabRecord('app\models\User', array('name' => 'davert'));
     * ```
     *
     * @param $model
     * @param array $attributes
     * @return mixed
     * @part orm
     */
    public function grabRecord($model, $attributes = [])
    {
        return $this->findRecord($model, $attributes);
    }

    protected function findRecord($model, $attributes = [])
    {
        $this->getModelRecord($model);
        return call_user_func([$model, 'find'])
            ->where($attributes)
            ->one();
    }

    protected function getModelRecord($model)
    {
        if (!class_exists($model)) {
            throw new \RuntimeException("Model $model does not exist");
        }
        $record = new $model;
        if (!$record instanceof \yii\db\ActiveRecordInterface) {
            throw new \RuntimeException("Model $model is not implement interface \\yii\\db\\ActiveRecordInterface");
        }
        return $record;
    }

    /**
     * Converting $page to valid Yii 2 URL
     * 
     * Allows input like:
     * 
     * ```php
     * $I->amOnPage(['site/view','page'=>'about']);
     * $I->amOnPage('index-test.php?site/index');
     * $I->amOnPage('http://localhost/index-test.php?site/index');
     * ```
     * 
     * @param $page string|array parameter for \yii\web\UrlManager::createUrl()
     */
    public function amOnPage($page)
    {
        if (is_array($page)) {
            $page = \Yii::$app->getUrlManager()->createUrl($page);
        }
        parent::amOnPage($page);
    }
}
