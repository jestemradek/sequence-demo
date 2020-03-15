Sequence Demo App
=================

The "Sequence Demo App" is a example application created to show
how to implement sample mathematic sequence into Symfony framework.

Requirements
------------

  * PHP 7.1.3 or higher;
  * Symfony 
  * and the [usual Symfony application requirements][1].

Installation
------------

Download project to your PC and install depedencies:

```bash
$ git clone git@github.com:jestemradek/sequence-demo.git
$ cd sequence-demo
$ composer install
```

Usage
-----

There are two ways to use this application.
Enter this command and access the application in your
browser at the given URL (<http://localhost:8000> by default):

```bash
$ symfony serve
```

If you don't have the Symfony binary installed, run this command:

```bash
$ php -S 127.0.0.1:8000 -t public/
```

Second way to use this application is the command line,
enter this command and type numbers as a parameters e.g.:

```bash
$ symfony console app:sequence 33 44 55 1000 99999
```

or this command if you don't have the Symfony binary installed:
```bash
$ php bin/console app:sequence 33 44 55 1000 99999
```

[1]: https://symfony.com/doc/current/reference/requirements.html