## PHP version >= 8.1 for Laravel 10

#### Setup 
* Install npm packages
	```
	npm i
	```
* Install composer packages
	```
	composer install
	```
* Setup Database and Migrate
	```
	php artisan migrate
	```
* Seed Database
	```
	php artisan db:seed
	```
	-	User will be created with login credentials
		* email: `g.john@simplecrud.com`
		* password: `T3sting123`

* Serve
	> Open two terminals and run separately
		
		```
		npm run dev
		```
		```
		php artisan serve
		```


