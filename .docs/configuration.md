# Settings

All settings are in the file `config.json`.

As the extension says, the structure must obey the hierarchy of a valid JSON object.

### Querying data

Use the `config()` function to access the framework settings.

```php
$version = config()->version;
```

You can define any extra information in the `config.json` file so you can reuse it during the project.
