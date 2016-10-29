SimpleBlog
==========

Laravel 5.3 Simple Blog Application

How to Install
-------------
```
$ git clone https://github.com/cminatti/simpleblog.git
```
```
$ cd simpleblog
```
```
$ composer install
```
```
$ cp .env.example .env
```

* Edit your .env file to add your database settings. (Don't forget to create the database)
```
$ php artisan migrate —seed
```
```
$ php artisan serve
```
* The admin username and passwords are 'admin@admin.com' and 'secret'

For development
---------------
* For development, install npm libraries
```
$ npm install
```
* Then compile with 
```
$ gulp
```
