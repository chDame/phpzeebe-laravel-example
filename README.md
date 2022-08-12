This is an example of using [phpZeebe](https://github.com/camunda-community-hub/phpZeebe) with Laravel
## Building
This is a Laravel application built with composer. To build it, please uncomment the fileinfo extension in your php.ini
```
extension=fileinfo
```
If like me, you're relying on sqlite, also uncomment :
```
extension=pdo_sqlite
extension=sqlite3
```
## create the tables 
```
php artisan queue:table
php artisan migrate
```
## start a proces instance

http://localhost:8000/api/process/start

## add jobs in the queue

http://localhost:8000/workers

## start jobs
```
php artisan queue:work
```