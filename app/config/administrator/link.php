<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Links',

	'single' => 'link',

	'model' => 'Link',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'title' => array(
			'title' => 'Title',
		),
		'link' => array(
			'title' => 'Link',
		),
        'created_at' => array(
            'title' => 'Created_at',
        ),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'title' => array(
			'title' => 'Title',
		),
		'link' => array(
			'title' => 'Link',
		),
		'created_at' => array(
			'title' => 'Created_at',
            'type'  => 'date',
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'title' => array(
			'title' => 'Title',
			'type' => 'text',
		),
		'link' => array(
			'title' => 'Link',
			'type' => 'text',
		),
	),

);
