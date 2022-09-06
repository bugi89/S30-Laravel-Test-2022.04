### Run application

Install composer dependencies:

```shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

Prepare local environment for sail:
```shell
cp .env.development .env
```

Run local environment using sail:

```shell
./vendor/bin/sail up -d
```

Run migrations:
```shell
docker exec test-app_laravel.test_1 php artisan migrate
```

Run seeders:
```shell
docker exec test-app_laravel.test_1 php artisan db:seed
```

### Test API endpoints:


```shell
# create user
curl --request POST 'http://0.0.0.0/api/users' \
--form 'email="test@email.test"' \
--form 'full_name="Test Name"' \
--form 'role="Author"'
```


```shell
# get users by roles
curl--request GET 'http://0.0.0.0/api/users?roles[]=Author&roles[]=Editor'
```
