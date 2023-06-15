# Laravel stubs

Improved Laravel stubs.

## Usage
### Installation
```bash
composer require --dev recoded-dev/laravel-stubs
```

### Publishing stubs
```bash
php artisan stubs:publish
```
That's it! This packages handles everything else.

## Contribution
Development to this package requires tests, static analysis
and conforming to the coding-standard.

To validate these locally run the following with dev dependencies installed:
```bash
vendor/bin/phpunit && vendor/bin/phpstan && vendor/bin/phpcs
```
