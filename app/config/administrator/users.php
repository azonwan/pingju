<?php

/**
 * Actors model config
 */

return array(

	'title' => 'User',

	'single' => 'user',

	'model' => 'User',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'name' => array(
			'title' => 'Name',
		),
		'email' => array(
			'title' => 'Email',
		),
		'topic_count' => array(
			'title' => 'topic count',
			'sort_field' => 'topic_count',
		),
        'reply_count' => array(
            'title' => 'reply count',
            'sort_field' => 'reply_count',
        ),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'name' => array(
			'title' => 'Name',
		),
		'email' => array(
			'title' => 'Email',
		),
		'topic_count' => array(
			'title' => 'topic count',
			'name_field' => 'topic_count',
		),
		'reply_count' => array(
			'title' => 'reply count',
		),
        'is_banned' => array(
            'title' => 'is_banned',
        ),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'is_banned' => array(
			'title' => 'Banned',
		),
	),

);
