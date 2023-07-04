<?php
/**
 * Main Model trait
 *
 * This trait is used by models and provides common database operations such as querying, inserting, updating, and deleting records.
 */

trait Model
{
    use Database;

    public $errors = [];

	public function selectAll()
	{
		$query = "SELECT * FROM {$this->table} ORDER BY {$this->order_column} {$this->order_type} LIMIT {$this->limit} OFFSET {$this->offset}";
	
		// Execute the query and handle errors
		try {
			return $this->query($query);
		} catch (Exception $e) {
			// Handle the exception or log the error
			throw new Exception("Error executing query: " . $e->getMessage());
		}
	}
	
	public function selectFirst($data, $data_not = [])
	{
		$keys = array_keys($data);
		$keys_not = array_keys($data_not);
		$query = "SELECT * FROM {$this->table} WHERE ";
		foreach ($keys as $key) {
			$query .= "{$key} = :{$key} AND ";
		}
		foreach ($keys_not as $key) {
			$query .= "{$key} != :{$key} AND ";
		}
		$query = rtrim($query, " AND ");
		$query .= " LIMIT {$this->limit} OFFSET {$this->offset}";
		$data = array_merge($data, $data_not);
	
		// Execute the query and handle errors
		try {
			$result = $this->query($query, $data);
			if ($result) {
				return $result[0];
			}
			return false;
		} catch (Exception $e) {
			// Handle the exception or log the error
			throw new Exception("Error executing query: " . $e->getMessage());
		}
	}
	

	public function where($data, $data_not = [])
	{
		$keys = array_keys($data);
		$keys_not = array_keys($data_not);
	
		// Validate table name
		if (empty($this->table)) {
			throw new Exception("Table name is not specified.");
		}
	
		// Validate order column and type
		if (empty($this->order_column) || empty($this->order_type)) {
			throw new Exception("Order column or type is not specified.");
		}
	
		$query = "SELECT * FROM {$this->table} WHERE ";
		foreach ($keys as $key) {
			$query .= "{$key} = :{$key} AND ";
		}
		foreach ($keys_not as $key) {
			$query .= "{$key} != :{$key} AND ";
		}
		$query = rtrim($query, " AND ");
		$query .= " ORDER BY {$this->order_column} {$this->order_type} LIMIT {$this->limit} OFFSET {$this->offset}";
	
		// Merge data arrays
		$data = array_merge($data, $data_not);
	
		// Execute the query and handle errors
		try {
			return $this->query($query, $data);
		} catch (Exception $e) {
			// Handle the exception or log the error
			throw new Exception("Error executing query: " . $e->getMessage());
		}
	}
	


	public function insert($data)
	{
		if (!empty($this->allowedColumns)) {
			foreach ($data as $key => $value) {
				if (!in_array($key, $this->allowedColumns)) {
					unset($data[$key]);
				}
			}
		}
	
		// Validate table name
		if (empty($this->table)) {
			throw new Exception("Table name is not specified.");
		}
	
		$keys = array_keys($data);
		$query = "INSERT INTO {$this->table} (" . implode(",", $keys) . ") VALUES (:" . implode(",:", $keys) . ")";
	
		// Execute the query and handle errors
		try {
			$this->query($query, $data);
			return true;
		} catch (Exception $e) {
			// Handle the exception or log the error
			throw new Exception("Error executing query: " . $e->getMessage());
		}
	}
	

	public function update($id, $data, $id_column = 'id')
	{
		if (!empty($this->allowedColumns)) {
			foreach ($data as $key => $value) {
				if (!in_array($key, $this->allowedColumns)) {
					unset($data[$key]);
				}
			}
		}
		$keys = array_keys($data);
		$query = "UPDATE {$this->table} SET ";
		foreach ($keys as $key) {
			$query .= "{$key} = :{$key}, ";
		}
		$query = rtrim($query, ", ");
		$query .= " WHERE {$id_column} = :{$id_column}";
		$data[$id_column] = $id;
	
		// Execute the query and handle errors
		try {
			$this->query($query, $data);
			return true;
		} catch (Exception $e) {
			// Handle the exception or log the error
			throw new Exception("Error executing query: " . $e->getMessage());
		}
	}
	

	public function delete($id, $id_column = 'id')
	{
		$data[$id_column] = $id;
		$query = "DELETE FROM {$this->table} WHERE {$id_column} = :{$id_column}";
	
		// Execute the query and handle errors
		try {
			$this->query($query, $data);
			return true;
		} catch (Exception $e) {
			// Handle the exception or log the error
			throw new Exception("Error executing query: " . $e->getMessage());
		}
	}
	
	public function customQuery($query, $data = [])
	{
		try {
			return $this->query($query, $data);
		} catch (Exception $e) {
			// Handle the exception or log the error
			throw new Exception("Error executing custom query: " . $e->getMessage());
		}
	}
	
	public function singleQuery($query, $data = [])
	{
		try {
			$result = $this->query($query, $data);
			if ($result) {
				return $result[0];
			}
			return false;
		} catch (Exception $e) {
			// Handle the exception or log the error
			throw new Exception("Error executing single query: " . $e->getMessage());
		}
	}
	
}
