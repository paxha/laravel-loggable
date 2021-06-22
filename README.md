<p align="center">
<a href="https://travis-ci.com/paxha/laravel-loggable.svg?branch=main"><img src="https://travis-ci.com/paxha/laravel-loggable.svg?branch=main" alt="Build Status"></a>
<a href="https://github.styleci.io/repos/379184993?branch=main"><img src="https://github.styleci.io/repos/379184993/shield?branch=main" alt="StyleCI"></a>
<a href="https://packagist.org/packages/paxha/laravel-loggable"><img src="https://poser.pugx.org/paxha/laravel-loggable/d/total.svg?format=flat-square" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/paxha/laravel-loggable"><img src="https://poser.pugx.org/paxha/laravel-loggable/v/stable.svg?format=flat-square" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/paxha/laravel-loggable"><img src="https://poser.pugx.org/paxha/laravel-loggable/license.svg?format=flat-square" alt="License"></a>
</p>

Simple Laravel package to log CRUD operations of Models.


## Installation

Add the package to your Laravel app using composer

```
composer require paxha/laravel-loggable
```

### Service Provider

Register the package's service provider in config/app.php. In Laravel versions 5.5 and beyond, this step can be skipped if package auto-discovery is enabled.

```
'providers' => [

    ...
    paxha\Loggable\LoggableServiceProvider::class,
    paxha\Loggable\LoggableEventServiceProvider::class,
    ...

];
```


### Migrations

Execute the Artisan command to run the migrations.

```
php artisan migrate

```
## Usage

To start logging CRUD operations simply use the trait on your models.

```
use Loggable\Traits\Loggable;

class Post extends Model
{
    use Loggable;

    ...
```


---

## License

This is open-sourced laravel library licensed under the [MIT license](https://opensource.org/licenses/MIT).
