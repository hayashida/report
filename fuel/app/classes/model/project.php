<?php

class Model_Project extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'num',
		'title',
		'description',
		'date_start',
		'date_end',
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

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_callable("Myvalidation");

		$val->add("num", "Num");
		$val->add("title", "Title")
			->add_rule("required");

		$val->add("date_start", "Start")
			->add_rule("valid_date");

		$val->add("date_end", "End")
			->add_rule("valid_date");

		return $val;
	}
}
