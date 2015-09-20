<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Node',

	'single' => 'node',

	'model' => 'Node',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'name' => array(
			'title' => 'Name',
		),
		'slug' => array(
			'title' => 'Slug',
		),
		'formatted_parent_node' => array(
			'title' => 'Parent Node',
		),
        'description' => array(
            'title' => 'DESC',
        ),
        'topic_count' => array(
            'title' => 'Topic Count',
        ),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'name' => array(
			'title' => 'Name',
		),
		'slug' => array(
			'title' => 'Slug',
		),
		'description' => array(
			'title' => 'DESC',
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'name' => array(
			'title' => 'name',
			'type' => 'text',
		),
		'slug' => array(
			'title' => 'Slug',
			'type' => 'text',
		),
	),

);
