<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Permission',

	'single' => 'permission',

	'model' => 'Permission',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'name' => array(
			'title' => 'Name',
		),
		'display_name' => array(
			'title' => 'Display Name',
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
		'name' => array(
			'title' => 'Name',
		),
		'dispaly_name' => array(
			'title' => 'Last Name',
		),
		'created_at' => array(
			'title' => 'Created',
			'type' => 'date'
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'name' => array(
			'title' => 'Name',
			'type' => 'text',
		),
		'display_name' => array(
			'title' => 'Display Name',
			'type' => 'text',
		),
	),

);
