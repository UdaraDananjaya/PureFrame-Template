# Routes

**Important notes**

- By default no **HTML** or **PHP** files can be accessed directly, if you try to access it will return a 404 error.
- All files must be inside the `public` folder.
- Valid file extensions are `.php` and` .blade.php`.
- Accepted methods are: **GET**, **POST**, **PUT**, **PATCH** e **DELETE**.

## Friendly URLs

It is not necessary to define a route to access a view.

When you access the `/home` URL, the framework engine will look for the` home` file in the `public` folder.

If you try to access `/admin/home`, it is the equivalent of `public/admin/home`.

## Index

On an apache server we all know that by default it is searched for the file `index.html` or` index.php`.

In Attla this is no different, if an index is not defined, the framework engine will search for the file `index` inside the folder` public`.

Defining an index by the file `config.json`

```json
{
	"routes": {
		"index": "welcome"
	}
}
```

## Deleting routes

It is common that there are files that should not be accessed aside, such as a header or footer, or even a template. For this reason, you can choose to exclude the route, thus returning a 404 error if accessed via URL.

Deleting routes by file `config.json`

```json
{
	"routes": {
		"exclude_routes":[
			"error",
			"header",
			"footer"
		],
	}
}
```

## Defining routes

There are 2 ways to manipulate your website's routes.

By file `config.json`

```json
{
	"routes": {
		"GET":[
			"/home",
			"/blog"
		]
	}
}
```

or by file `index.php`

```php
$app = new Attla\App();

$app->get('/home', function(){
	echo "<h1>home</h1>";
});

$app->run();
```

## Route nomenclature

Have you noticed how complicated it is to have to change a URL in a medium to large application ?

That is why it is recommended that your application does not know the URLs and manipulate the routes solely by their names.

But how do we do that ? Simple..

By file `config.json`

!> Note that instead of an array, an object is passed

```json
{
	"routes": {
		"GET":{
			"home": "/home",
			"blog": "/blog"
		},
		"POST":{
			"login": "/login"
		}
	}
}
```

or by file `index.php`

```php
$app = new Attla\App();

$app->get('/blog', function(){
	echo '<h1>Blog</h1>';
})->setName('blog');

$app->post('/login', function(){
	echo '<h1>Login</h1>';
})->name('login');

$app->run();
```

And to retrieve the URL of a route, the function `route()`.

```html
<a href="<?= route('blog') ?>">Go to blog</a>
```

## Parâmetros de rota

It is common that you need to retrieve URL values during your application. For this reason, when defining a route, it is possible to define values that will be converted into variables. Understand in the example below:

By file `config.json`

```json
{
	"routes": {
		"GET":{
			"blog.article": "/article/:id",
			"blog.author": "/blog/author/:id/:name"
		}
	}
}
```
In the `article` file you can retrieve the value by calling the variable `$id`.

Anything that is not variable is converted to path, that is `/blog/author/:id/:name` is the equivalent of `public/blog/author`.

By file `index.php`

```php
$app = new Attla\App();

$app->get('/article/:id', function($id){
	echo "<h1>Article $id</h1>";
})->name('blog.article');

$app->get('/blog/author/:id/:name', function($id, $name){
	echo "<h1>Author $id, $name</h1>";
})->name('blog.author');

$app->run();
```

## Parameter restrictions with regular expressions

You can restrict the format of your route parameters using the `where` method on a route instance. The `where` method accepts the parameter name and a regular expression that defines how the parameter should be restricted.

By file `index.php`

```php
$app = new Attla\App();

$app->get('/article/:id', function($id){
	echo "<h1>Article $id</h1>";
})->where('id', '[0-9]+')->name('blog.article');

$app->get('/blog/author/:id/:name', function($id, $name){
	echo "<h1>Author $id, $name</h1>";
})->where(['id' => '[0-9]+', 'name' => '[a-z\-]+'])->name('blog.author');

$app->run();
```

If the named route contains parameters, you can pass the parameters as the second argument to the `route()` function. The parameters provided will be automatically inserted into the URL in their correct positions.

```php
$article_url = route('blog.article', ['id' => 123]);

$author_url = route('blog.author', ['id' => 42, 'name' => 'lucas-nicolau']);
```

## Phantom parameters

When defining a `/author` route, and accessing `/author/42/lucas-nicolau` you will still fall in the `/author` route as the framework compares the beginning of the URL with the route. The rest of the URL is converted to a numeric array. See how to recover these ghost parameters below.

```php
$id = $_GET[0]; // 42

$author_name = $_GET[1]; // lucas-nicolau
```

Keep in mind that this method only works if there is a defined route that is compatible with the beginning of the URL.

## Route grouping

As your application grows it is normal to have several routes with the same prefix for example `/admin`. Understand in the example below how to group routes by a prefix.

By file `config.json`

```json
{
	"routes": {
		"/admin":{
			"index": "/dashboard",
			"GET":{
				"admin.dashboard": "/dashboard",
				"admin.user": "/user"
			},
			"POST":{
				"admin.login": "/login",
			}
		}
	}
}
```

The `index` position defines the default file that will be called when accessing `/admin`.

By file `index.php`

```php
$app = new Attla\App();

$app->group('/admin', function() use ($app){
	$app->get('/dashboard', function(){
		echo '<h1>Dashboard</h1>';
	})->name('admin.dashboard');

	$app->get('/user', function(){
		echo '<h1>Login</h1>';
	})->name('admin.user');

	$app->post('/login', function(){
		echo '<h1>Login</h1>';
	})->name('admin.login');
});

$app->run();
```

## Global routes

It may be that you have routes from your site that need to be accessed either via **GET** or **POST** or for example a login page.

So you can define a route and not worry about which method will be accessed.

By file `config.json`

```json
{
	"routes": {
		"GLOBAL":{
			"site.login": "/login",
			"site.register": "/register"
		}
	}
}
```

By file `index.php`

```php
$app = new Attla\App();

$app->global('/login', function(){
	echo "<h1>Login</h1>";
})->name('site.login');

$app->run();
```

Any of these [ **GLOBAL**, **GLOBALS**, **REQUEST** ] keys can be used to define a global route.

## Form Method Spoofing

HTML forms do not support **PUT**, **PATCH** or **DELETE** actions. So, when defining **PUT**, **PATCH** or **DELETE** routes that are called from an HTML form, you will need to add a hidden `_method` field to the form. The value sent with the `_method` field will be used as the HTTP request method.

```html
<form action="/foo/bar" method="POST">
	<input type="hidden" name="_method" value="PUT">
</form>
```

You may use the `@method` Blade directive to generate the `_method` input.

```html
<form action="/foo/bar" method="POST">
    @method('PUT')
</form>
```

## View Routes

As you may have already noticed that in the `config.json` file the routes are oriented to views. However, this feature is not exclusive to the `config.json` file.

By file `index.php`

```php
$app = new Attla\App();

$app->get('/blog/article/:id', 'blog/article')->name('blog.article');

$app->run();
```

## Route controllers

Attla does not use MVC by default, however you can use controllers instead of a Closure.

By file `index.php`

```php
$app = new Attla\App();

$app->get('/blog', 'blogControler:index')->name('blog');

$app->run();
```
