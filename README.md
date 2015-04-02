# Mock PHP built-in functions with Mockery

This package integrates the function mock library
[PHP-Mock](https://github.com/php-mock/php-mock) with Mockery.

## Requirements and restrictions

* Mockery-0.8 or greater.

# Installation

Use [Composer](https://getcomposer.org/):

```json
{
    "require-dev": {
        "php-mock/php-mock-mockery": "0.1"
    }
}
```

# Usage

[`PHPMockery::mock()`](http://php-mock.github.io/php-mock-mockery/api/class-phpmock.mockery.PHPMockery.html#_mock)
let's you build a function mock which can be equiped
with Mockery's expectations. After your test you'll have to disable all created
function mocks by calling `Mockery::close()`.

## Example

```php
<?php

namespace foo;

use phpmock\mockery\PHPMockery;

$mock = PHPMockery::mock(__NAMESPACE__, "time")->andReturn(3);
assert (3 == time());

\Mockery::close();
```

# License and authors

This project is free and under the WTFPL.
Responsable for this project is Markus Malkusch markus@malkusch.de.

## Donations

If you like this project and feel generous donate a few Bitcoins here:
[1335STSwu9hST4vcMRppEPgENMHD2r1REK](bitcoin:1335STSwu9hST4vcMRppEPgENMHD2r1REK)

[![Build Status](https://travis-ci.org/php-mock/php-mock-mockery.svg?branch=master)](https://travis-ci.org/php-mock/php-mock-mockery)
