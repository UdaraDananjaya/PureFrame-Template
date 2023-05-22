# Database

The configuration of the database connection is in the file `config.json`

```json
{
	"db" : {
		"driver": "mysql",
		"host": "localhost",
		"port": "3306",
		"database": "attla",
		"username": "root",
		"password": ""
	},
}
```

The connection is made from the PDO library.

In the Attla framework, models are not used, so there are functions that will assist in the execution of queries to the database.

```php
// executes a query, if there is only 1 result, only that will be returned
$users = query("SELECT * FROM users"); // Ex: ['id' => 42, 'name' => 'Lucas Nicolau']

// bind params
$users2 = query('SELECT * FROM users WHERE id = :id', ['id' => 42]);

// executes a query, and forces the return of a list of arrays with the results
// recommended for use in loops
$users3 = query_list("SELECT * FROM users"); // Ex: [ ['id' => 42, 'name' => 'Lucas Nicolau'] ]

// bind params
$users4 = query_list('SELECT * FROM users WHERE id = :id', ['id' => 42]);
```
