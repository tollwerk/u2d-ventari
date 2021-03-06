# tollwerk/u2d-ventari

[![Build Status][travis-image]][travis-url] [![Coverage Status](https://coveralls.io/repos/github/tollwerk/u2d-ventari/badge.svg?branch=master)](https://coveralls.io/github/tollwerk/u2d-ventari?branch=master)
 [![Scrutinizer Code Quality][scrutinizer-image]][scrutinizer-url] [![Code Climate][codeclimate-image]][codeclimate-url]  [![Clear architecture][clear-architecture-image]][clear-architecture-url]

> U2D Ventari API client in PHP

## Documentation

Please find the [project documentation](doc/index.md) in the `doc` directory.

## Installation

This library requires PHP >=7.2 or later. I recommend using the latest available version of PHP as a matter of principle. It has no userland dependencies.

## Dependencies

![Composer dependency graph](https://rawgit.com/tollwerk/u2d-ventari/master/doc/dependencies.svg)

## Quality

To run the unit tests at the command line, issue `composer install` and then `phpunit` at the package root. This requires [Composer](http://getcomposer.org/) to be available as `composer`, and [PHPUnit](http://phpunit.de/manual/) to be available as `phpunit`.

This library attempts to comply with [PSR-1][], [PSR-2][], and [PSR-4][]. If you notice compliance oversights, please send a patch via pull request.

## Contributing

Found a bug or have a feature request? [Please have a look at the known issues](https://github.com/tollwerk/u2d-ventari/issues) first and open a new issue if necessary. Please see [contributing](CONTRIBUTING.md) and [conduct](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email info@tollwerk.de instead of using the issue tracker.

## Credits

- [tollwerk GmbH][author-url]
- [All Contributors](../../contributors)

## License

Copyright © 2019 [tollwerk GmbH][author-url] / info@tollwerk.de. Licensed under the terms of the [MIT license](LICENSE).

[travis-image]: https://secure.travis-ci.org/tollwerk/u2d-ventari.svg
[travis-url]: https://travis-ci.org/tollwerk/u2d-ventari
[coveralls-image]: https://coveralls.io/repos/github/tollwerk/u2d-ventari/badge.svg?branch=master
[coveralls-url]: https://coveralls.io/github/tollwerk/u2d-ventari?branch=master
[scrutinizer-image]: https://scrutinizer-ci.com/g/tollwerk/u2d-ventari/badges/quality-score.png?b=master
[scrutinizer-url]: https://scrutinizer-ci.com/g/tollwerk/u2d-ventari/?branch=master
[codeclimate-image]: https://lima.codeclimate.com/github/tollwerk/u2d-ventari/badges/gpa.svg
[codeclimate-url]: https://lima.codeclimate.com/github/tollwerk/u2d-ventari

[clear-architecture-image]: https://img.shields.io/badge/Clear%20Architecture-%E2%9C%94-brightgreen.svg
[clear-architecture-url]: https://github.com/jkphl/clear-architecture
[author-url]: https://tollwerk.de
[PSR-1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
[PSR-2]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[PSR-4]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md
