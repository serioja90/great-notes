<?php

interface DatabaseAdapter{
	public function find($params);
	public function find_by_sql($params);
	public function execute($sql,$params);
}

?>