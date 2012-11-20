<?php
//デフォルトの行き先とか変更できる
return array(
	'_root_'  => 'top/index',  // The default route
	'_404_'   => 'notfound/index',    // The main 404 route

	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);