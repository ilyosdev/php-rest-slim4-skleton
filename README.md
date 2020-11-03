# SLIM 4 - API SKELETON

Useful skeleton for RESTful API development, using [Slim PHP micro framework](https://www.slimframework.com).

Used technologies: `PHP 7, Slim 4, MySQL, PHPUnit, dotenv, Docker & Docker Compose`.

[![Software License][ico-license]](LICENSE.md)
[![Build Status](https://travis-ci.com/maurobonfietti/slim4-api-skeleton.svg?branch=master)](https://travis-ci.com/maurobonfietti/slim4-api-skeleton)
[![Coverage Status](https://coveralls.io/repos/github/maurobonfietti/slim4-api-skeleton/badge.svg?branch=master)](https://coveralls.io/github/maurobonfietti/slim4-api-skeleton?branch=master)
[![Packagist Version](https://img.shields.io/packagist/v/maurobonfietti/slim4-api-skeleton)](https://packagist.org/packages/maurobonfietti/slim4-api-skeleton)

[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat


## :gear: QUICK INSTALL:

### Requirements:

- Composer.
- PHP 7.3+.
- MySQL/MariaDB.
- or Docker.


### With Composer:

You can create a new project running the following commands:

```bash
$ composer create-project maurobonfietti/slim4-api-skeleton [my-api-name]
$ cd [my-api-name]
$ composer test
$ composer start
```


#### Configure your connection to MySQL Server:

By default, the API use a MySQL Database.

You should check and edit this configuration in your `.env` file:

```
DB_HOST='127.0.0.1'
DB_NAME='yourMySqlDatabase'
DB_USER='yourMySqlUsername'
DB_PASS='yourMySqlPassword'
```


### With Docker:

If you like Docker, you can use this project with **docker** and **docker-compose**.


**Minimal Docker Version:**

* Engine: 18.03+
* Compose: 1.21+


**Docker Commands:**

```bash
# Create and start containers for the API.
$ docker-compose up -d --build

# Checkout the API.
$ curl http://localhost:8081

# Stop and remove containers.
$ docker-compose down
```


## :package: DEPENDENCIES:

### LIST OF REQUIRE DEPENDENCIES:

- [slim/slim](https://github.com/slimphp/Slim): Slim is a PHP micro framework that helps you quickly write simple yet powerful web applications and APIs.
- [slim/psr7](https://github.com/slimphp/Slim-Psr7): PSR-7 implementation for use with Slim 4.
- [pimple/pimple](https://github.com/silexphp/Pimple): A small PHP dependency injection container.
- [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv): Loads environment variables from `.env` to `getenv()`, `$_ENV` and `$_SERVER` automagically.

### LIST OF DEVELOPMENT DEPENDENCIES:

- [phpunit/phpunit](https://github.com/sebastianbergmann/phpunit): The PHP Unit Testing framework.
- [symfony/console](https://github.com/symfony/console): The Console component eases the creation of beautiful and testable command line interfaces.
- [nunomaduro/phpinsights](https://github.com/nunomaduro/phpinsights): Instant PHP quality checks from your console.
- [maurobonfietti/slim4-api-skeleton-crud-generator](https://github.com/maurobonfietti/slim4-api-skeleton-crud-generator): CRUD Generator for Slim 4 - Api Skeleton.


## :bookmark: ENDPOINTS:

### BY DEFAULT:

- Hello: `GET /`

- Health Check: `GET /status`


## SQL
-- ----------------------------
-- Table structure for notes
-- ----------------------------
DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of notes
-- ----------------------------
INSERT INTO `notes` (`id`, `name`, `description`) VALUES ('1', 'My Note 1', 'My first online note');
INSERT INTO `notes` (`id`, `name`, `description`) VALUES ('2', 'Chinese Proverb', 'Those who say it can not be done, should not interrupt those doing it.');
INSERT INTO `notes` (`id`, `name`, `description`) VALUES ('3', 'Long Note 3', 'This is a very large note, or maybe not...');
INSERT INTO `notes` (`id`, `name`, `description`) VALUES ('4', 'Napoleon Hill', 'Whatever the mind of man can conceive and believe, it can achieve.');
INSERT INTO `notes` (`id`, `name`, `description`) VALUES ('5', 'Note 5', 'A Random Note');

INSERT INTO `notes`
    (`name`, `description`)
VALUES
    ('Brian Tracy', 'Develop an attitude of gratitude, and give thanks for everything that happens to you, knowing that every step forward is a step toward achieving something bigger and better than your current situation.'),
    ('Zig Ziglar', 'Your attitude, not your aptitude, will determine your altitude.'),
    ('William James', 'The greatest discovery of my generation is that a human being can alter his life by altering his attitudes.'),
    ('Og Mandino', 'Take the attitude of a student, never be too big to ask questions, never know too much to learn something new.'),
    ('Earl Nightingale', 'Our attitude towards others determines their attitude towards us.'),
    ('Norman Vincent Peale', 'Watch your manner of speech if you wish to develop a peaceful state of mind. Start each day by affirming peaceful, contented and happy attitudes and your days will tend to be pleasant and successful.'),
    ('W. Clement Stone', 'There is little difference in people, but that little difference makes a big difference. The little difference is attitude. The big difference is whether it is positive or negative.'),
    ('Dale Carnegie', 'Happiness does not depend on any external conditions, it is governed by our mental attitude.'),
    ('Walt Disney', 'If you can dream it, you can do it.'),
    ('William Shakespeare', 'Our doubts are traitors and make us lose the good we oft might win by fearing to attempt.'),
    ('Albert Einstein', 'A person who never made a mistake never tried anything new.');
