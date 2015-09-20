<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Reply',

	'single' => 'reply',

	'model' => 'Reply',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'body' => array(
			'title' => 'body',
		),
		'user_id' => array(
			'title' => 'User',
			'relationship' => 'user',
			'select' => '(:table).name',
		),
		'topic_id' => array(
			'title' => 'Topic',
            'relationship' => 'topic',
			'select' => '(:table).title',
        ),
        'is_block' => array(
            'title' => 'Block',
            'type' => 'enum',
            'select' => 'IF((:table).is_block,"unblock","block")',
        ),
        'vote_count' => array(
            'title' => 'Vote Count',
        ),
        'created_at' => array(
            'title' => 'Created',
        ),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'body' => array(
			'title' => 'Reply',
		),
		'user' => array(
			'title' => 'Users',
            'type' => 'relationship',
            'name_field' => 'name',
		),
		'topic' => array(
			'title' => 'Topic',
			'type' => 'relationship',
			'name_field' => 'title',
		),
		'is_block' => array(
			'title' => 'Block',
            'type' => 'enum',
            'options' => array(
                0 => 'block',
                1 => 'unblock', 
            ),
		),
        'created_at' => array(
            'title' => 'Created',
            'type' => 'date',
        ),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'body' => array(
			'title' => 'body',
			'type' => 'markdown',
            'height' => 130,
		),
		'is_block' => array(
			'title' => 'Block',
			'type' => 'enum',
            'options' => array(
                0 => 'block',
                1 => 'unblock', 
            ),
		),
	),

);
