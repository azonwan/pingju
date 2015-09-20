<?php
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Encryption;
use Illuminate\Cookie;

class ExtController extends BaseController
{
    /**
     * 输出验证码
     */
    public function captcha()
    {
        $builder = new CaptchaBuilder;
        $builder->build();
        $phrase = $builder->getPhrase();
        Crypt::setKey(Config::get('app.cookie_key'));
        $phrase_new = Crypt::encrypt($phrase);
        Session::flash('__captcha', $phrase_new);
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
        exit;
    }
}
