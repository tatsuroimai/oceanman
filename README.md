# Oceanman

![](public/img/homeimage.png)
## About

You can post photos and share with everyone with this app! Also, you can search photos by topics or keywords or using both. If you want to search specific user, search the name of the user as a keyword. If you find any photo you like, leave your comment on the post.
 
## Install

1. Clone this repository

```$ git clone https://github.com/tatsuroimai/oceanman.git```

```$ cd oceanman```

```$ brew install composer```

```$ composer install```

```$ cp .env.example .env```

```$ php artisan key:generate```

```$ touch database/database.sqlite```

```
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=
# DB_USERNAME=
# DB_PASSWORD=
```

```$ php artisan migrate```

```$ php artisan serve```


