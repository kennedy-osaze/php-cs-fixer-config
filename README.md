# Opinionated configuration for PHP coding standard rules

This contains an opinionated PHP coding standard rules for [PHP-CS-Fixer]((https://github.com/FriendsOfPHP/PHP-CS-Fixer)) which could be used on personal projects and packages alike

## Installation
```bash
composer require --dev kennedy-osaze/php-cs-fixer-config
```

## Basic Usage
Create a `.php-cs-fixer.dist.php` config file at the root of your project and paste this:

```php
<?php

use KennedyOsaze\PhpCsFixerConfig\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()->in(__DIR__);

return Config::make($finder);
```

### Customisation
By default, the package uses its default rules to set up PHP-CS-Fixer. The rules can be extended by doing:

```php
$rules = [
    // Your PHP-CS-Fixer rules come here...
];

return Config::make($finder)->mergeRules($rules);
```

The `KennedyOsaze\PhpCsFixerConfig\Config` is basically an extension of the PHP-CS-Fixer `Config` class, and as such, it be configured in the same way the later is usually configured.

### Running
Run following command in your project directory, that will run fixer for every `.php` file.

```bash
vendor/bin/php-cs-fixer fix
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
