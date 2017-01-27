<?php
namespace Apatis\CoreIntercept\Tests\PhpUnit;

use Apatis\CoreIntercept\CallableFunction;

/**
 * Class TestFunctions
 * @package Apatis\CoreIntercept
 */
class TestFunctions extends \PHPUnit_Framework_TestCase
{
    public function testCall()
    {
        $string = 'A B C d E F G h';
        $func = new CallableFunction();
        $this->assertEquals(
            \strtolower($string),
            $func->call('strtolower', $string)
        );

        /** @noinspection PhpUndefinedMethodInspection */
        $this->assertEquals(
            \strtolower($string),
            $func->strtolower($string)
        );
    }
}
