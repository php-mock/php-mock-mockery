<?php

namespace phpmock\mockery;

use malkusch\phpmock\AbstractMockTest;
use Mockery;

/**
 * Tests PHPMockery.
 *
 * @author Markus Malkusch <markus@malkusch.de>
 * @link bitcoin:1335STSwu9hST4vcMRppEPgENMHD2r1REK Donations
 * @license http://www.wtfpl.net/txt/copying/ WTFPL
 * @see PHPMockery
 */
class PHPMockeryTest extends AbstractMockTest
{

    protected function disableMocks()
    {
        Mockery::close();
    }

    protected function mockFunction($namespace, $functionName, callable $function)
    {
        PHPMockery::mock($namespace, $functionName)->andReturnUsing($function);
    }
}
