<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Favorite',

	'single' => 'favorite',

	'model' => 'Favorite',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'user_id' => array(
			'title' => 'User',
            'relationship' => 'user',
            'select' => '(:table).name',
		),
		'topic_id' => array(
			'title' => 'Topic',
            'relationship' => 'topic',
            'select' => '(:table).title',
            'sortable' => false,
		),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
        'topic' => array(
            'title' => 'Topic', 
            'type'  => 'relationship',
            'name_field' => 'title',
        ),
        'user' => array(
            'title' => 'User',
            'type' => 'relationship',
            'name_field' => 'name',
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
            'editable' => false,
		),
	),

);
