<?php

namespace phpmock\mockery;

use Mockery;
use Mockery\Expectation;
use phpmock\MockBuilder;
use phpmock\integration\MockDelegateFunctionBuilder;

/**
 * Mock built-in PHP functions with Mockery.
 *
 * <code>
 * <?php
 *
 * namespace foo;
 *
 * use phpmock\mockery\PHPMockery;
 *
 * $mock = PHPMockery::mock(__NAMESPACE__, "time")->andReturn(3);
 * assert (3 == time());
 *
 * \Mockery::close();
 * </code>
 *
 * @author Markus Malkusch <markus@malkusch.de>
 * @link bitcoin:1335STSwu9hST4vcMRppEPgENMHD2r1REK Donations
 * @license http://www.wtfpl.net/txt/copying/ WTFPL
 */
class PHPMockery
{

    /**
     * Builds a function mock.
     *
     * Disable this mock after the test with Mockery::close().
     *
     * @param string $namespace The function namespace.
     * @param string $name      The function name.
     *
     * @return Expectation The mockery expectation.
     * @SuppressWarnings(PHPMD)
     */
    public static function mock($namespace, $name)
    {
        $delegateBuilder = new MockDelegateFunctionBuilder();
        $delegateBuilder->build($name);
        
        $mockeryMock = Mockery::mock($delegateBuilder->getFullyQualifiedClassName());
        $expectation = $mockeryMock->makePartial()->shouldReceive(MockDelegateFunctionBuilder::METHOD);
        
        $builder = new MockBuilder();
        $builder->setNamespace($namespace)
                ->setName($name)
                ->setFunctionProvider($mockeryMock);
        $mock = $builder->build();
        $mock->enable();
        
        $disabler = new MockDisabler($mock);
        Mockery::getContainer()->rememberMock($disabler);
        
        return $expectation;
    }
}
