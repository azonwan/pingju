<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Tips',

	'single' => 'tip',

	'model' => 'Tip',

	/**
	 * The display columns
	 */
	'columns' => array(
		'body' => array(
			'title' => 'body',
		),
		'created_at' => array(
			'title' => 'Created',
		),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'body' => array(
			'title' => 'Body',
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
		),
	),

);
