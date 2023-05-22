<?php

/**
 * Demo Model Class
 */
class Demo_model
{

	use Model;

	protected $limit = 10;
	protected $offset = 0;
	protected $order_type = "asc";
	protected $order_column = "id";
	protected $table;
	protected $allowedColumns = [];

	function set_table($name)
	{
		$this->table = $name;
	}

	function set_allowedColumns($allowedColumns)
	{
		$this->allowedColumns = $allowedColumns;
	}

	function set_order_type($order_type)
	{
		$this->order_type = $order_type;
	}

	function set_order_column($order_column)
	{
		$this->order_column = $order_column;
	}

	function set_limit($limit)
	{
		$this->limit = $limit;
	}

	function set_offset($offset)
	{
		$this->offset = $offset;
	}
}
