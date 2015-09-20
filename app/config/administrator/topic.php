<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Topics',

	'single' => 'topic',

	'model' => 'Topic',

	/**
	 * The display columns
	 */
	'columns' => array(
		//'id',
		'title' => array(
			'title' => '标题',
		),
		'user_id' => array(
			'title' => '创建',
			'relationship' => 'user',
			'select' => '(:table).name',
		),
        'node_id' => array(
            'title' => '节点',
            'relationship' => 'node',
            'select' => '(:table).name',
        ),
        'is_excellent' => array(
            'title' => '精品',
            'select' => 'IF((:table).is_excellent,"yes","no")',
        ),
        'is_wiki' => array(
            'title' => 'Wiki',
            'select' => 'IF((:table).is_wiki,"yes","no")',
        ),
        'is_blocked' => array(
            'title' => 'Block',
            'select' => 'IF((:table).is_blocked,"yes","no")'
        ),
        'reply_count' => array(
            'title' => '回复',
        ),
        'view_count' => array(
            'title' => '查看',
        ),
        'favorite_count' => array(
            'title' => '收藏',
        ),
        'vote_count' => array(
            'title' => '投票',
        ),
		'last_reply_user_id' => array(
			'title' => '最后回复',
			'relationship' => 'user',
			'select' => '(:table).name',
		),
        'created_at' => array(
            'title' => '创建时间'
        ),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'title' => array(
			'title' => 'Title',
		),
		'user' => array(
			'title' => 'User',
			'type' => 'relationship',
			'name_field' => 'name',
		),
        'node' => array(
            'title' => 'Node',
			'type' => 'relationship',
            'name_field' => 'name',
        ),
        'is_excellent' => array(
            'title' => 'Excellent',
            'type' => 'bool',
        ),
        'is_wiki' => array(
            'title' => 'Wiki',
            'type' => 'bool',
        ),
        'is_blocked' => array(
            'title' => 'Block',
            'type' => 'bool',
        ),
        //'deleted_at' => array(
        //    'title' => 'deleted_at',
        //    'type' => 'bool',
        //),
        'created_at' => array(
            'title' => 'created_at',
            'type' => 'date',
        ),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'title' => array(
			'title' => 'Title',
            'type' => 'text',
            'editable' => false,
		),
        'body' => array(
            'title' => 'Body',
            'type' => 'markdown',
            'height' => '200',
            'editable' => false,
        ),
        'is_excellent' => array(
            'title' => 'Excellent',
            'type' => 'bool',
        ),
        'is_wiki' => array(
            'title' => 'Wiki',
            'type' => 'bool',
        ),
        'is_blocked' => array(
            'title' => 'Block',
            'type' => 'bool',
        ),
	),

);
