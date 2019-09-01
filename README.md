# Laravel service creator

[![PHP](https://img.shields.io/github/tag/slyusarchyn/laravel-service-creator.svg)](https://github.com/slyusarchyn/laravel-service-creator)
[![Downloads](https://img.shields.io/packagist/dt/slyusarchyn/laravel-service-creator.svg)](https://packagist.org/packages/slyusarchyn/laravel-service-creator)
[![Stars](https://img.shields.io/github/stars/slyusarchyn/laravel-service-creator.svg)](https://github.com/slyusarchyn/laravel-service-creator)

Laravel service creator

## Installation

To install this package you will need:

* Laravel 5.5 +
* PHP >= 7.1.3

Install via **composer** - edit your `composer.json` to require the package.
```json
"require": {
    "slyusarchyn/laravel-service-creator": "1.0.*"
}
```
Then run `composer update` in your terminal to install it in.

OR

Run `composer require slyusarchyn/laravel-service-creator`

## How to use?

### Create new service

For creating new service, you should use that command where "Product" is your service name.

```bash
php artisan make:service UserService
```

## License

MIT License

Copyright (c) 2019 slyusarchyn

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.