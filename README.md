<p align="center">
<a href="https://travis-ci.com/paxha/laravel-loggable.svg?branch=main"><img src="https://travis-ci.com/paxha/laravel-loggable.svg?branch=main" alt="Build Status"></a>
<a href="https://github.styleci.io/repos/379184993?branch=main"><img src="https://github.styleci.io/repos/379184993/shield?branch=main" alt="StyleCI"></a>
<a href="https://packagist.org/packages/paxha/laravel-loggable"><img src="https://poser.pugx.org/paxha/laravel-loggable/d/total.svg?format=flat-square" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/paxha/laravel-loggable"><img src="https://poser.pugx.org/paxha/laravel-loggable/v/stable.svg?format=flat-square" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/paxha/laravel-loggable"><img src="https://poser.pugx.org/paxha/laravel-loggable/license.svg?format=flat-square" alt="License"></a>
</p>

The ```paxha/laravel-loggable``` package provides easy to use functions to log the all CRUD operations
 of the loggable model in your app. It can also automatically log model events. All Logs will be stored
  in the ``logs`` table.

## Installation

Add the package to your Laravel app using composer

```
composer require paxha/laravel-loggable
```

### Getting Started

Execute the Artisan command to run the migrations.

```
php artisan migrate

```
## Usage

To start logging CRUD operations simply use the trait on your models.

```
use Loggable\Traits\Loggable;

class Product extends Model
{
    use Loggable;

    ...
```
###Model's Logs
Logs that are stored in database are something like this string

"A New **Product 1** is Created by - User Name"

to override this bold **name** string you can write this method in your Model.

 
by default it will take **name** column
```
use Loggable\Traits\Loggable;

class Product extends Model
{
    use HasLogs;

    public function getActedUpon(){
        return $this->title;
    }
}
```
it can be any column from your Loggable table like name,title,product_name or anything.

You can retrieve Loggable Model's Logs
```
$product_logs = Product::first()->logs();
// return Array of first Product's logs
 ```
You can retrieve Authenticatable Model's Logs by using this Trait **HasLogs**
```
use Loggable\Traits\Loggable;

class User extends Model
{
    use HasLogs;

    ...
```
```
$user_logs = auth()->user()->logs();
// return Array of current authenticated User's logs
 ```
Logs that are stored in database are something like this string
###User's Logs
"A New Product 1 is Created by - **User Name**"

to override this bold user's **name** string you can write this method in your Model.
 ```
 use Loggable\Traits\Loggable;
 
 class User extends Model
 {
     use HasLogs;
 
     public function getActor(){
         return $this->first_name." ".$this->last_name;
     }
 }
 ```

by default it will take **name** column

it can be any column from your Autheticatable table like name,email,id or anything
####Using Both Traits in one Place
if you want to use both Traits in One Model you will need to implement this code snippet to overcome multiple inheritence problem
```
 use Loggable\Traits\Loggable;
 
 class User extends Model
 {
     use Loggable, HasLogs {
             Loggable::logs insteadof HasLogs;
             HasLogs::logs as historyLogs;
         }
 }
 ```
you can choose any name instead of **historyLogs**
```
$user_logs = auth()->user()->historyLogs();
// return Array of current authenticated User's logs
 ```

---

## License

This is open-sourced laravel library licensed under the [MIT license](https://opensource.org/licenses/MIT).
