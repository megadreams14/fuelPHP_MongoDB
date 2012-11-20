<?php
class Model_Sample extends Mongo_Crud
{
	protected static $_table_name = 'samples';

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('id', 'Id', 'required|valid_string[numeric]');
		$val->add_field('platform', 'Platform', 'required|max_length[255]');
		$val->add_field('site', 'Site', 'required|max_length[255]');
		$val->add_field('sales', 'Sales', 'required|valid_string[numeric]');
		$val->add_field('member', 'Member', 'required|valid_string[numeric]');
		$val->add_field('active', 'Active', 'required');

		return $val;
	}

}
