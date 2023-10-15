# HAWK
<img width="1191" alt="Screenshot 2023-10-15 at 2 20 37 PM" src="https://github.com/nishanb/Hawk/assets/21797317/1410fbf8-88fd-4999-8e8b-538034b9f8e3">

# Monitoring of Suspicious activity in cms
 Built with laravel 5 and python 

## Getting started
Admin Crdentials
user: admin@hawkblog.in
password: admin123

User Credentials
user: user@hawkblog.in
password: user123

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
