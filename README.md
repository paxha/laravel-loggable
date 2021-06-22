<p align="center">
<a href="https://travis-ci.com/paxha/laravel-loggable.svg?branch=main"><img src="https://travis-ci.com/paxha/laravel-loggable.svg?branch=main" alt="Build Status"></a>
<a href="https://github.styleci.io/repos/379184993?branch=main"><img src="https://github.styleci.io/repos/379184993/shield?branch=main" alt="StyleCI"></a>
<a href="https://packagist.org/packages/paxha/laravel-loggable"><img src="https://poser.pugx.org/paxha/laravel-loggable/d/total.svg?format=flat-square" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/paxha/laravel-loggable"><img src="https://poser.pugx.org/paxha/laravel-loggable/v/stable.svg?format=flat-square" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/paxha/laravel-loggable"><img src="https://poser.pugx.org/paxha/laravel-loggable/license.svg?format=flat-square" alt="License"></a>
</p>

## Introduction
This Laravel Eloquent extension provides recursive relationships using common table.

## Installation

    composer require paxha/laravel-recursive-relationships

## Usage

-   [Getting Started](#getting-started)
-   [Relationships](#relationships)
-   [Scopes](#scopes)
-   [Functions](#functions)

### Getting Started

Consider the following table schema for hierarchical data:

```php
Schema::create('users', function (Blueprint $table) {
    $table->increments('id');
    $table->unsignedInteger('parent_id')->nullable();
});
```

Use the `HasRecursiveRelationships` trait in your model to work with recursive relationships:

```php
class User extends Model
{
    use \RecursiveRelationships\Traits\HasRecursiveRelationships;
}
```

By default, the trait expects a parent key named `parent_id`. You can customize it by overriding `getParentKeyName()`:

```php
class User extends Model
{
    use \RecursiveRelationships\Traits\HasRecursiveRelationships;

    public function getParentKeyName()
    {
        return 'user_id'; // or anything
    }
}
```

## License

This is open-sourced laravel library licensed under the [MIT license](https://opensource.org/licenses/MIT).
