# Deploying

## Install packages

### Check the rights for reading and writing for the cache directory `var/cache`

```
composer install
```

## Copy `.env.dist` to `.env` and edit the database string:

```
DATABASE_URL=mysql://root:password@127.0.0.1:3306/dbname?serverVersion=5.7
```

## Create the datbase

```
bin/console doctrine:database:create
```

## Apply the database migrations

```
bin/console doctrine:migrations:migrate
```

## Apply the fixtures

```
bin/console doctring:fixtures:load
```

## Run the server

```
bin/console server:run
```

## Run the browser
```
firefox 127.0.0.1:8000
```

## Logins and passwords
* admin:admin
* user:user
* root:root
* administrator:administrator
