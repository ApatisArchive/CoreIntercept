<?php
namespace Apatis\CoreIntercept;

use Apatis\Exceptions\InvalidArgumentException;

/**
 * Class CallableFunction
 * @package Apatis\CoreIntercept
 * @method *
 */
class CallableFunction
{
    /**
     * Call the function
     *
     * @param string $name
     * @return mixed
     */
    public function call($name)
    {
        if (! is_callable($name)) {
            throw new InvalidArgumentException(
                sprintf(
                    '%s is not callable!',
                    gettype($name) == 'string' ? $name : gettype($name)
                )
            );
        }

        $args = func_get_args();
        array_shift($args);

        return call_user_func_array($name, $args);
    }

    /**
     * Intercept magic method to call existing functions
     *
     * @param string $name      the function name to call
     * @param array  $arguments arguments to insert into function call process
     * @return mixed return followed the function to call
     */
    public function __call($name, array $arguments)
    {
        if (! is_callable($name)) {
            throw new InvalidArgumentException(
                sprintf(
                    '%s is not callable!',
                    gettype($name) == 'string' ? $name : gettype($name)
                )
            );
        }

        return call_user_func_array($name, $arguments);
    }
}
