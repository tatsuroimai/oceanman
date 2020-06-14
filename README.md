# Oceanman

![](public/img/homeimage.png)
## About

You can post photos and share with everyone with this app! Also, you can search photos by topics or keywords or using both. If you want to search specific user, run a keyword search by the name of the user. If you find any photo you like, leave your comment on the post.
 
## Install

1. Clone this repository

```$ git clone https://github.com/tatsuroimai/oceanman.git```

2. cd into oceanman

```$ cd oceanman```

3. Install composer dependencies

```$ composer install```

4. Copy the .env.example file and rename it into the .env file

```$ cp .env.example .env```

5. Generate a new key

```$ php artisan key:generate```

6. Create a database

```$ touch database/database.sqlite```

7. Edit .env file

```
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=
# DB_USERNAME=
# DB_PASSWORD=
```

8. Edit database.php

```
'default' => env('DB_CONNECTION', 'sqlite'),
```

9. This project is supposed to use S3 (Storage service offered by AWS). If you use S3, edit this section in .env file. if you don't, edit UserController.php and PostController.php to change where to save image files.

```
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=
AWS_BUCKET=
```

9. Make tables in the database

```$ php artisan migrate```

10. Run project

```$ php artisan serve```


