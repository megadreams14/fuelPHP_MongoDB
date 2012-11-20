<?php
class Model_Demo extends Mongo_Crud
{
	protected static $_table_name = 'demos';

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('id', 'Id', 'required|valid_string[numeric]');
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('data', 'Data', 'required|max_length[255]');

		return $val;
	}

}
