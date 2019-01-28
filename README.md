# Monitoring of Suspicious activity in cms
 Built with laravel 5 and python 

## Getting started


### Clone existing repository

    git clone clone_url
    
### Update dependencies

    composer update
    
### Make DB Migartion
Modify DB name and DB name in .env file or import the database
    
    php artisan migrate
    
### Genearte Application Key
    
    php artisan key:generate

### Run application

    php artisan serve
    
local application will be started at [localhost:8000](localhost:8000). Port number may differ



## Database
The sql dump is in _SQL/lsapp.sql