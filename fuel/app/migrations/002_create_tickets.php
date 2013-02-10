<?php

namespace Fuel\Migrations;

class Create_tickets
{
	public function up()
	{
		\DBUtil::create_table('tickets', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'project_id' => array('constraint' => 11, 'type' => 'int'),
			'priority' => array('constraint' => 11, 'type' => 'int'),
			'category' => array('constraint' => 255, 'type' => 'varchar'),
			'func' => array('constraint' => 255, 'type' => 'varchar'),
			'content' => array('type' => 'text'),
			'description' => array('type' => 'text'),
			'status' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('tickets');
	}
}