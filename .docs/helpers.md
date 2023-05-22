# Helpers

List of functions that can help you during the development of your application.

| Method | Parameters | Description |
| - | - | - |
[dd($var)](#dd) | Mixed | Equivalent to the `dd()` of the laravel. It's a more stylized `var_dump()`
[config()](#config) | - | Returns an object with the application's settings
[route($routeName, $params)](#route) | String, Array | Returns the route URL by name
[redirect($url)](#redirect) | String | Make a redirect
[get($key)](#get) | String | Returns a variable value `$_GET`
[post($key)](#post) | String | Returns a variable value `$_POST`
[input($key)](#input) | String | Returns a variable value `$_REQUEST`
[name($name)](#name) | String | Returns the first and last name from the full name
[year()](#year) | - | Returns the year in the 2018 - 2020 format from the year in `config.json`
[uri($location)](#uri) | String | Returns the application URL
[url($location)](#url) | String | Alias of `uri()`
[assets($file)](#assets) | String | Returns the absolute path pointing to the folder `assets`
[asset($file)](#asset) | String | Alias of `assets()`
[set_global($key, $val)](#set_global) | String or Array, Mixed | Defines a variable globally
[set_globals($key, $val)](#set_globals) | String or Array, Mixed | Alias of `set_global()`
[get_global($key)](#get_global) | String | Returns the value of a global variable
[get_globals($key)](#get_globals) | String | Alias of `get_global()`
[get_header($title, $description, $path)](#get_header) | String, String, String | Includes the `header` file with the extension `.php` or `.blade.php` with access to all global variables
[page_header($title, $description, $path)](#page_header) | String, String, String | Alias of `get_header()`
[get_footer($path)](#get_footer) | String | Includes the file `footer` with the extension `.php` or `.blade.php` with access to all global variables
[page_footer($path)](#page_footer) | String | Alias of `get_footer()`
[import($file)](#import) | String | Includes a file, either with the extension `.php` or `.blade.php`, with access to all global variables
[is_ajax()](#is_ajax) | - | Checks whether it is an AJAX request
[is_browser($key)](#is_browser) | String | Checks whether the request was made by a browser
[browser()](#browser) | - | Returns the name of the browser
[browser_version()](#browser_version) | - | Returns the browser version
[is_mobile($key)](#is_mobile) | String | Checks if the request was made by a mobile device
[mobile()](#mobile) | - | Returns the name of the mobile device
[is_robot($key)](#is_robot) | String | Checks whether the request was made by a bot
[robot()](#robot) | - | Returns the name of the bot
[is_referral()](#is_referral) | - | Checks whether the request originated from another site
[referrer()](#referrer) | - | Returns the referrer URL
[user($key)](#user) | String | Returns the value of an index of user data
[new_sign()](#new_sign) | - | Renews user session and returns data
[is_logged()](#is_logged) | - | Checks if the user is logged in
[query($query, $bindParams)](#query) | String, Array | Run a query, if there is only 1 result, only that will be returned
[query_list($query, $bindParams)](#query_list) | String, Array | Executes a query, and forces the return of a list of arrays with the results
[exist($table, $key, $value)](#exist) | String, String, Mixed | Checks whether a record exists in the database
[array_random($array)](#array_random) | Array | Returns the same array however with the positions in scrambled order
[array_random_value($array)](#array_random_value) | Array | Returns the value of an array position randomly
[is_empty($val)](#is_empty) | String | Checks whether a string is empty
[is_email($email)](#is_email) | String | Checks whether the value is a valid email
[is_username($username)](#is_username) | String | Checks whether the value is a valid username
[is_url($url)](#is_url) | String | Checks whether the value is a valid URL
[is_name($name)](#is_name) | String | Checks whether the value is a full name
[json($data)](#json) | Mixed | Convert data to json, display it later to the application

### dd()

Equivalent to the `dd()` of the laravel. It's a more stylized `var_dump()`.

```php
dd(['id' => 42, 'email' => 'example@email.com', 'name' => 'Lucas Nicolau']);
```

### config()

Returns an object with the application's settings.

```php
$version = config()->version;
```

### route()

Returns the route URL by name.

```php
$login_url = route('login');

$edit_user_url = route('edit.user', ['id' => 42]);
```

### redirect()

Make a redirect.

```php
redirect('/login');

redirect('https://google.com');
```

### get()

Returns a variable value `$_GET`.

```php
$email = get('email');
```

### post()

Returns a variable value `$_POST`.

```php
$email = post('email');
```

### input()

Returns a variable value `$_REQUEST`.

```php
$email = input('email');
```

### name()

Returns the first and last name from the full name.

```php
$name = name('John Smith Doe');
```

### year()

Returns the year in the 2018 - 2020 format from the year in `config.json`.

```php
$year = year();
```

### uri()

Returns the application URL.

```php
$app_url = uri();

$app_login_url = uri('/login');
```

### url()

Alias of `uri()`.

```php
$app_url = url();

$app_login_url = url('/login');
```

### assets()

Returns the absolute path pointing to the folder `assets`.

```php
$style_url = assets('css/style.css');

$mainjs_url = assets('js/main.js');
```

### asset()

Alias of `assets()`.

```php
$style_url = asset('css/style.css');

$mainjs_url = asset('js/main.js');
```

### set_global()

Defines a variable globally.

```php
set_global('user', [
	'id' => 42,
	'name' => 'Lucas Nicolau'
]);

// define several variables at the same time
set_global([
	'user' => [
		'id' => 42,
		'name' => 'Lucas Nicolau'
	],
	'is_logged' => true
]);
```

### set_globals()

Alias of `set_global()`.

```php
set_globals('user', [
	'id' => 42,
	'name' => 'Lucas Nicolau'
]);

// define several variables at the same time
set_globals([
	'user' => [
		'id' => 42,
		'name' => 'Lucas Nicolau'
	],
	'is_logged' => true
]);
```

### get_global()

Returns the value of a global variable.

```php
$uri = get_global('uri');
```

### get_globals()

Alias of `get_global`.
```php
$uri = get_globals('uri');
```

### get_header()

Includes the `header` file with the extension `.php` or `.blade.php` with access to all global variables.

```php
get_header('titulo da página');

// if the header is in a directory inside the public folder ex public/admin/
// you can pass the third parameter being the path of the directory
get_header('titulo da página', 'descrição da página', '/admin');
```

### page_header()

Alias of `get_header()`.
```php
page_header('titulo da página');

// if the header is in a directory inside the public folder ex public/admin/
// you can pass the third parameter being the path of the directory
page_header('titulo da página', 'descrição da página', '/admin');
```

### get_footer()

Includes the file `footer` with the extension `.php` or `.blade.php` with access to all global variables.

```php
get_footer();

// if the footer is in a directory inside the public folder ex public/admin/
// you can pass the directory path
get_footer('/admin');
```

### page_footer()

Alias of `get_footer()`.
```php
page_footer();

// if the footer is in a directory inside the public folder ex public/admin/
// you can pass the directory path
page_footer('/admin');
```

### import()

Includes a file, either with the extension `.php` or `.blade.php`, with access to all global variables.

```php
import('file');

import('admin/dashboard_sidebar');
```

### is_ajax()

Checks whether it is an AJAX request.

```php
$is_ajax = is_ajax();
```

### is_browser()

Checks whether the request was made by a browser.

```php
$is_browser = is_browser();

$is_chrome_browser = is_browser('Chrome');
$is_firefox_browser = is_browser('Firefox');
$is_opera_browser = is_browser('OPR');
```

### browser()

Returns the name of the browser.

```php
$browser = browser();
```

### browser_version()

Returns the browser version.

```php
$browser_version = browser_version();
```

### is_mobile()

Checks if the request was made by a mobile device.

```php
$is_mobile = is_mobile();

$is_iphone = is_mobile('iphone');
```

### mobile()

Returns the name of the mobile device.

```php
$mobile = mobile();
```

### is_robot()

Checks whether the request was made by a bot.

```php
$is_robot = is_robot();

$is_google_robot = is_robot('googlebot');
$is_yahoo_robot = is_robot('yahoo');
$is_bing_robot = is_robot('bingbot');
```

### robot()

Returns the name of the bot.

```php
$robot = robot();
```

### is_referral()

Checks whether the request originated from another site.

```php
$is_referral = is_referral();
```

### referrer()

Returns the referrer URL.

```php
$referrer = referrer();
```

### user()

Returns the value of an index of user data.

```php
// all user data
$user_email = user();

// just email
$user_email = user('email');
```

### new_sign()

Renews user session and returns data.

```php
$user_data = new_sign();
```

### is_logged()

Checks if the user is logged in.

```php
$is_logged = is_logged();
```

### query()

Run a query, if there is only 1 result, only that will be returned.

```php
$users = query("SELECT * FROM users"); // Ex: ['id' => 42, 'name' => 'Lucas Nicolau']

// bind params
$users2 = query('SELECT * FROM users WHERE id = :id', ['id' => 42]);
```

### query_list()

Executes a query, and forces the return of a list of arrays with the results.

```php
$users = query_list("SELECT * FROM users"); // Ex: [ ['id' => 42, 'name' => 'Lucas Nicolau'] ]

// bind params
$users2 = query_list('SELECT * FROM users WHERE id = :id', ['id' => 42]);
```

### exist()

Checks whether a record exists in the database.

```php
$user_exist = exist('users', 'email', 'example@email.com');
```

### array_random()

Returns the same array however with the positions in scrambled order.

```php
$array_random = array_random(['id' => 42, 'email' => 'example@email.com', 'name' => 'Lucas Nicolau']);
```

### array_random_value()

Returns the value of an array position randomly.

```php
$array_random_value = array_random_value(['id' => 42, 'email' => 'example@email.com', 'name' => 'Lucas Nicolau']);
```

### is_empty()

Checks whether a string is empty.

```php
$is_empty = is_empty('test');
```

### is_email()

Checks whether the value is a valid email.

```php
$valid_email = is_email('example@email.com');

$invalid_email = is_email('example');
```

### is_username()

Checks whether the value is a valid username.

```php
// ^[a-z\d_.-]{3,20}$
$valid_username = is_username('nicolauns');

$invalid_username = is_username('1');
$invalid_username2 = is_username('example@email.com');
```

### is_url()

Checks whether the value is a valid URL.

```php
$valid_url = is_url('https://google.com');

$invalid_url = is_url('google.com');
```

### is_name()

Checks whether the value is a full name.

```php
$valid_name = is_name('Lucas Nicolau');

$invalid_name = is_name('Lucas');
```

### json()

Convert data to json, display it later to the application.

```php
json([
	'id' => 42,
	'email' => 'example@email.com',
	'name' => 'Lucas Nicolau'
]);
```
