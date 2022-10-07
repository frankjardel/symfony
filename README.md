# Symfony 5 - CLI & Settings

$ wget https://get.symfony.com/cli/installer -O - | bash

$ export PATH="$HOME/.symfony/bin:$PATH"


$ composer req serializer

$ composer req cors


# SSL Local

$ symfony server:ca:install


# Start Server

$ symfony server:start


# Migrations

$ composer req maker

$ composer req orm

$ composer require doctrine/doctrine-migrations-bundle "^3.0"

$ php bin/console doctrine:migrations:generate

$ php bin/console doctrine:migrations:migrate


# Auth

ref: https://medium.com/suleyman-aydoslu/basic-authentication-and-registration-steps-with-symfony-security-bundle-symfony-5-a5518ee0a9da

$ php bin/console make:user

$ php bin/console doctrine:migrations:diff

$ php bin/console doctrine:migrations:migrate

$ php bin/console make:auth

name: SecurityController


$ php bin/console security:encode-password

enter with your password: ...

result example:

  Encoder used       Symfony\Component\Security\Core\Encoder\MigratingPasswordEncoder                                   
  Encoded password   $argon2id$v=19$m=65536,t=4,p=1$/fkiT6zZhUGcXv2iPchFaQ$jOnods/6M0DGXAteRpOkCscKbEEvuPCuBAaogf3Pxsk


$ symfony composer req security


# MVC

$ php bin/console make:entity

$ php bin/console make:controller


# Debug Routes

$ php bin/console debug:router
