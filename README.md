WARNING work in progress

![Hoa](http://static.hoa-project.net/Image/Hoa_small.png)

Hoa is a **modular**, **extensible** and **structured** set of PHP libraries.
Moreover, Hoa aims at being a bridge between industrial and research worlds.

# Hoathis\LaravelHoaRuler

Integrates [Hoa\Ruler](https://github.com/hoaproject/Ruler) in Laravel.

## Installation

With [Composer](http://getcomposer.org/), to include this bundle into your
dependencies, you need to require
[`hoathis/laravel-hoa-ruler`](https://packagist.org/packages/hoathis/laravel-hoa-ruler):

```json
{
    "require": {
        "hoathis/laravel-hoa-ruler": "~1.0"
    }
}
```

or simply run

	composer require "hoathis/laravel-hoa-ruler"


Once you have run a composer update, you need to register the service provider. Open config/app.php and add the following to the providers key.

	'HoaThis\LaravelHoaRuler\Laravel\Providers\RulerServiceProvider'

Optionally, to register the Ruler facade, in the aliases key of your config/app.php file add

	'Ruler' => 'HoaThis\LaravelHoaRuler\Laravel\Facades\Ruler'

And then use ```php artisan vendor:publish``` to publish the default configuration.

Then you are ready to use!

## Quick usage

### Configuration options

TODO

### Ruler service

... [Ruler's documentation](http://hoa-project.net/Literature/Hack/Ruler.html).

```php
// TODO example
```

### Profiler
...

## License

Hoa is under the New BSD License (BSD-3-Clause). Please, see
[`LICENSE`](http://hoa-project.net/LICENSE).
