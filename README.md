## Star Wars characters list

> A list of characters from Star Wars

## Requirements

- [Composer](https://getcomposer.org/)
- [PHP 5.6.4ˆ](https://secure.php.net/)
- [Node](https://nodejs.org)
- [Bower](https://bower.io/)

## Run the project locally

- 1 - Clone 
```sh
$ git clone https://github.com/jjonathan/StarWarsCharList.git
$ cd StarWarsCharList
```

- 2 - Install composer dependencies:

```sh
$ composer install
```

- 3 - Install bower dependencies:

```sh
$ cd public/assets
$ bower install
$ cd ../..
```

- 4 - Make a copy of .env.example and rename just as .env:

```sh
$ cp .env.example .env
```

- 5 - Generate Laravel key:

```sh
$ php artisan key:generate
```

- 6 - Run Laravel server:

```sh
$ php artisan serve
```

- 7 - Open locally in [http://127.0.0.1:8000](http://127.0.0.1:8000) and have fun :)