<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Attention',

	'single' => 'attention',

	'model' => 'Attention',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'topic_id' => array(
			'title' => 'Topic',
			'relationship' => 'topic',
			'select' => "(:table).title",
		),
		'user_id' => array(
			'title' => 'User',
			'relationship' => 'user',
			'select' => '(:table).name',
		),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
        'topic' => array(
            'title' => 'Topic',
            'type' => 'relationship',
            'name_field' => 'title',
        ),
        'user' => array(
            'title' => 'User',
            'type' => 'relationship',
            'name_field' => 'name',
        ),
	),

);
