<?php

class Model_Ticket extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'project_id',
		'category',
		'func',
		'content',
		'description',
		'status',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

    public static $_belongs_to = array(
        "project" => array(
            "key_from" => "project_id",
            "model_to" => "Model_Project",
            "key_to" => "id",
            "cascade_save" => false,
            "cascade_delete" => false,
        ),
    );

    public static function validate($factory)
    {
    	$val = Validation::forge($factory);

    	$val->add("category", "Category")
    		->add_rule("required");

    	$val->add("func", "Function")
    		->add_rule("required");

    	$val->add("content", "Content")
    		->add_rule("required");

    	return $val;
    }
}
