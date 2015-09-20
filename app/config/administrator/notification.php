<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Notification',

	'single' => 'notification',

	'model' => 'Notification',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'from_user_id' => array(
			'title' => 'From User',
            'relationship' => 'user',
			'select' => "(:table).name",
		),
		'user_id' => array(
			'title' => 'To User',
			'relationship' => 'user',
			'select' => '(:table).name',
		),
		'topic_id' => array(
			'title' => 'Topic',
            'relationship' => 'topic',
			'select' => '(:table).title',
		),
        'reply_id' => array(
            'title' => 'Reply_id',
            //'relationship' => 'replies',
            //'select' => '(:table).body',
        ),
        'type' => array(
            'title' => 'Type',
        ),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'user' => array(
			'title' => 'To User',
			'type' => 'relationship',
            'name_field' => 'name',
		),
		'topic' => array(
			'title' => 'Topic',
			'type' => 'relationship',
			'name_field' => 'title',
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'topic' => array(
			'title' => 'Topic',
			'type' => 'relationship',
			'name_field' => 'title',
            'editable' => false
		),
	),

);
