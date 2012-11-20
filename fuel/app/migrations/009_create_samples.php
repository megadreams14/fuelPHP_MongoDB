<?php

namespace Fuel\Migrations;

class Create_samples
{
	public function up()
	{
		\DBUtil::create_table('samples', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'id' => array('constraint' => 11, 'type' => 'int'),
			'platform' => array('constraint' => 255, 'type' => 'varchar'),
			'site' => array('constraint' => 255, 'type' => 'varchar'),
			'sales' => array('constraint' => 11, 'type' => 'int'),
			'member' => array('constraint' => 11, 'type' => 'int'),
			'active' => array('type' => 'float'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('samples');
	}
}