<?php

namespace Fuel\Migrations;

class Create_projects
{
	public function up()
	{
		\DBUtil::create_table('projects', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'num' => array('constraint' => 255, 'type' => 'varchar'),
			'title' => array('constraint' => 255, 'type' => 'varchar'),
			'description' => array('type' => 'text', 'null' => true),
			'date_start' => array('type' => 'date', 'null' => true),
			'date_end' => array('type' => 'date', 'null' => true),
			'status' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('projects');
	}
}