## UI42 Assignment

To initialize project, run:

~~~php
composer install && npm run dev
~~~

To create .env file and generate an application key:

~~~php
php artisan initialize
~~~

Edit .env file to use your database, for example: 

~~~php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ui42
DB_USERNAME=root
DB_PASSWORD=root
~~~

To import the data, run:

~~~php
php artisan data:import
~~~

To geolocate the cities, run:

~~~php
php artisan data:geocode
~~~
