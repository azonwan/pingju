<?php

/**
 * Actors model config
 */

return array(

	'title' => 'User_Roles',

	'single' => '用户角色',

	'model' => 'AssignedRole',

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
		'role_id' => array(
			'title' => 'Role',
            'relationship' => 'role',
            'select' => '(:table).name',
		),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'user' => array(
            'title' => 'User',
            'type' => 'relationship',
            'name_field' => 'name',
        ),
        'role' => array(
            'title' => 'Role',
            'type' => 'relationship',
            'name_field' => 'name',
        ),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'user' => array(
            'title' => 'User',
            'type' => 'relationship',
            'name_field' => 'name',
        ),
        'role' => array(
            'title' => 'Role',
            'type' => 'relationship',
            'name_field' => 'name',
        ),
	),

);
