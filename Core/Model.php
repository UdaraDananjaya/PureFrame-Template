<?php

/**
 * Main Model trait
 * This Model Uses Database 
 * Also, we need to declare Table Name as a property
 */
trait Model
{
	use Database;
	public $errors = [];

	public function selectAll()
	{
		$query = "SELECT * FROM $this->table
			ORDER BY $this->order_column $this->order_type 
			LIMIT $this->limit 
			OFFSET $this->offset";
		return $this->query($query);
	}

	public function selectFirst($data, $data_not)
	{
		$keys = array_keys($data);
		$keys_not = array_keys($data_not);
		$query = "SELECT * FROM $this->table WHERE ";
		foreach ($keys as $key) {
			$query .= $key . " = :" . $key . " AND ";
		}
		foreach ($keys_not as $key) {
			$query .= $key . " != :" . $key . " AND ";
		}
		$query = rtrim($query, " AND ");
		$query .= " LIMIT $this->limit OFFSET $this->offset";
		$data = array_merge($data, $data_not);
		$result = $this->getRow($query, $data);
		if ($result) {
			return $result;
		}
		return false;
	}

	public function selectWhere($data, $data_not = [])
	{
		$keys = array_keys($data);
		$keys_not = array_keys($data_not);
		$query = "SELECT * FROM $this->table WHERE ";
		foreach ($keys as $key) {
			$query .= $key . " = :" . $key . " AND ";
		}
		foreach ($keys_not as $key) {
			$query .= $key . " != :" . $key . " AND ";
		}
		$query = rtrim($query, " AND ");
		$query .= " ORDER BY $this->order_column $this->order_type 
				LIMIT $this->limit 
				OFFSET $this->offset";
		$data = array_merge($data, $data_not);
		return $this->query($query, $data);
	}

	public function insert($data)
	{
		if (!empty($this->allowedColumns)) {
			$data = array_intersect_key($data, array_flip($this->allowedColumns));
		}
		$keys = array_keys($data);
		$query = "INSERT INTO $this->table 
			(" . implode(",", $keys) . ") VALUES
			(:" . implode(",:", $keys) . ")";
		$this->query($query, $data);
		return false;
	}

	public function insertGetId($data)
	{
		if (!empty($this->allowedColumns)) {
			$data = array_intersect_key($data, array_flip($this->allowedColumns));
		}
		$keys = array_keys($data);
		$query = "INSERT INTO $this->table 
			(" . implode(",", $keys) . ") VALUES
			(:" . implode(",:", $keys) . ")";
		return $this->getLastId($query);
	}

	public function update($id, $data, $id_column = 'id')
	{
		if (!empty($this->allowedColumns)) {
			$data = array_intersect_key($data, array_flip($this->allowedColumns));
		}
		$keys = array_keys($data);
		$query = "UPDATE $this->table SET ";
		foreach ($keys as $key) {
			$query .= $key . " = :" . $key . ", ";
		}
		$query = rtrim($query, ", ");
		$query .= " WHERE $id_column = :$id_column ";
		$data[$id_column] = $id;
		$this->query($query, $data);
		return false;
	}

	public function delete($id, $id_column = 'id')
	{
		$data[$id_column] = $id;
		$query = "DELETE FROM $this->table 
					WHERE $id_column = :$id_column ";
		$this->query($query, $data);
		return false;
	}

	public function single_query($query)
	{
		$result = $this->query($query);
		if ($result) {
			return $result[0];
		}
		return false;
	}

	public function custom_query($query)
	{
		return $this->query($query);
	}
}
