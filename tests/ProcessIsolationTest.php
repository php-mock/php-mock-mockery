<?php

namespace phpmock\mockery;

/**
 * Tests process isolation.
 *
 * @author Markus Malkusch <markus@malkusch.de>
 * @link bitcoin:1335STSwu9hST4vcMRppEPgENMHD2r1REK Donations
 * @license http://www.wtfpl.net/txt/copying/ WTFPL
 */
class ProcessIsolationTest extends \PHPUnit_Framework_TestCase
{
    
    public static function setUpBeforeClass()
    {
        // e.g. the autoloader of nikic/php-parser does that.
        ini_set('unserialize_callback_func', 'spl_autoload_call');
    }
    
    protected function tearDown()
    {
        parent::tearDown();

        \Mockery::close();
    }
    
    /**
     * Tests deserialization.
     *
     * @test
     * @runInSeparateProcess
     */
    public function testDeserializationInNewProcess()
    {
        PHPMockery::mock(__NAMESPACE__, "time")->andReturn(123);
        $this->assertEquals(123, time());
    }
}
