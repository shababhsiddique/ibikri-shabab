## About iBikri

This is a simple Classified Ads application

- Users can Register / Signup (in progress).
- Guests can View / Search Advertisements (in progress).
- Users can View / Search / Post Advertisements (in progress).
- Administrator can moderate posts and ban users (in progress).


## Uses Laravel Framework

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of any modern web application framework, making it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

If you are having trouble getting this project to run. Follow installation instructions.

# How to Install

1) git clone https://github.com/shababhsiddique/ibikri-shabab.git (on remote machine)

2) open your project folder in cmd or powershell

3) composer install (this will create 'vendor' folder and download all packages, NOTE: you need composer installed)    

4) Create and edit .env file (use .env.example as base)
   for windows users use powershell to 
        cp .env.example .env to create a copy

5) php artisan key:generate
    will create the unique application key for the .env file

For Database:

6) Create database . eg. db_ibikri

7) run migration
        php artisan migrate

        or

        php artisan migrate:fresh (if you already have database and want to overwrite)

8) Seed database        
        coming soon

## Contributing

If you would like to contribute to this project. Fork it and keep me posted with pull requests.

## Security Vulnerabilities

If you discover a security vulnerability within this ibikri application, please submit an [Issue](https://github.com/shababhsiddique/ibikri-shabab/issues).

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.## License

iBikri platform is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
