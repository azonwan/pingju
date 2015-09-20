<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Vote',

	'single' => 'vote',

	'model' => 'Vote',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'user_id' => array(
			'title' => 'User',
            'relationship' => 'user',
			'select' => "(:table).name",
		),
		'votable_id' => array(
			'title' => 'votable id',
		),
		'votable_type' => array(
			'title' => 'votable type',
		),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'user' => array(
			'title' => 'User',
            'type' => 'relationship',
            'name_field' => 'name',
		),
		'votable_id' => array(
			'title' => 'votable id',
		),
		'votable_type' => array(
			'title' => 'votable type',
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'votable_type' => array(
			'title' => 'votable type',
		),
	),

);
