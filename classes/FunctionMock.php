<?php

namespace phpmock\mockery;

use Mockery\MockInterface;
use Mockery\ExpectationInterface;
use Mockery\HigherOrderMessage;
use Mockery\ExpectsHigherOrderMessage;

/**
 * Partiall exposed Mockery API
 *
 * @author Markus Malkusch <markus@malkusch.de>
 * @link bitcoin:1335STSwu9hST4vcMRppEPgENMHD2r1REK Donations
 * @license http://www.wtfpl.net/txt/copying/ WTFPL
 */
interface FunctionMock
{

    /**
     * @return ExpectationInterface|HigherOrderMessage
     * @see MockInterface::allows()
     */
    public function allows();

    /**
     * @return ExpectationInterface|ExpectsHigherOrderMessage
     * @see MockInterface::expects()
     */
    public function expects();

    /**
     * @return ExpectationInterface|HigherOrderMessage
     * @see MockInterface::shouldReceive()
     */
    public function shouldReceive();

    /**
     * @return ExpectationInterface|HigherOrderMessage
     * @see MockInterface::shouldNotReceive()
     */
    public function shouldNotReceive();

    /**
     * @param null $args
     * @return mixed
     * @see MockInterface::shouldHaveReceived()
     */
    public function shouldHaveReceived($args = null);

    /**
     * @param null $args
     * @return mixed
     * @see MockInterface::shouldNotHaveReceived()
     */
    public function shouldNotHaveReceived($args = null);

}
