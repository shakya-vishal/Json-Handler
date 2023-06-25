# JSON Handler

## Installation

Install the package using [Composer](https://getcomposer.org/):

```bash
composer require vishalshakya/json-handler
```

## Requirements

- PHP 7.4 or higher
- PHPUnit (for running tests, required only for development)

## Usage

To use the `JsonHandler` class, make sure to import it into your PHP file:

```php
use Vishalshakya\JsonHandler;
```

### Encoding Data

The `encode` method allows you to convert an array or object into a JSON string:

```php
$data = ['name' => 'John Doe', 'age' => 25];

$jsonString = JsonHandler::encode($data);

echo $jsonString;
```

Output:

```plaintext
{"name":"John Doe","age":25}
```

### Decoding JSON Strings

The `decode` method converts a JSON string into a PHP data structure. By default, it returns an object:

```php
$jsonString = '{"name":"John Doe","age":25}';

$object = JsonHandler::decode($jsonString);

echo $object->name; // John Doe
echo $object->age;  // 25
```

If you want to decode the JSON string into an associative array, pass `true` as the second argument:

```php
$jsonString = '{"name":"John Doe","age":25}';

$array = JsonHandler::decode($jsonString, true);

echo $array['name']; // John Doe
echo $array['age'];  // 25
```

## Exception Handling

The `JsonHandler` class throws exceptions to indicate errors in encoding or decoding JSON data. Here are the possible exceptions:

- `InvalidArgumentException` is thrown when the input data type is invalid or the JSON string is not valid.
- `JsonException` is thrown when there is an error in the JSON encoding or decoding process.

Make sure to handle these exceptions appropriately in your code.

## Development

If you want to run the tests for this package, make sure you have PHPUnit installed. You can install it using Composer:

```bash
composer require --dev phpunit/phpunit
```

Then, run the tests with the following command:

```bash
vendor/bin/phpunit
```

## License

This package is open source and released under the [MIT License](https://github.com/your-username/your-package/blob/main/LICENSE). Feel free to modify and distribute it as needed.
