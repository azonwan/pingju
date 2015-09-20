<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Roles',

	'single' => 'role',

	'model' => 'Role',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'name' => array(
			'title' => 'Name',
		),
		'created_at' => array(
			'title' => 'Created',
		),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'name' => array(
			'title' => 'Name',
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
	),

);
