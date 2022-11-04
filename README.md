# News APi
APIs using Laravel for a news management application

[![N|Solid](https://cldup.com/dTxpPi9lDf.thumb.png)](https://nodesource.com/products/nsolid)

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

###### Model
- User
- News
- Comment


###### Usage
1. Clone the project via git clone or download the zip file.
2. Copy contents of .env.example file to .env file. Create a database and connect your database in .env file.

###### Run Migration
then run the following command to create migrations in the database.
```sh
php artisan migrate
```

###### Passport Install
```sh
php artisan passport:install
```

#### API EndPoint
###### Auth
- Register http://127.0.0.1:8000/api/register
- Login http://127.0.0.1:8000/api/login

###### News
- Get News http://127.0.0.1:8000/api/news
- Add News http://127.0.0.1:8000/api/news
- Update News http://127.0.0.1:8000/api/news/1
- Delete News http://127.0.0.1:8000/api/news/1

###### Comment
- Get Comment http://127.0.0.1:8000/api/comment
- Add Comment http://127.0.0.1:8000/api/comment
- Update Comment http://127.0.0.1:8000/api/comment/1
- Delete Comment http://127.0.0.1:8000/api/comment/1

