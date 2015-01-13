<?php

namespace Etki\Api\Common\Client\Exception\Transport;

use Etki\Api\Common\Client\Exception\RuntimeException;
use Exception;

/**
 * Designed to be thrown whenever request time limit is exceeded.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Exception\Transport
 * @author  Etki <etki@etki.name>
 */
class TimeLimitExceededException extends RuntimeException
{
    /**
     * Initializer.
     *
     * @param string    $message  Exception message.
     * @param Exception $previous Previous exception.
     *
     * @return self
     * @since 0.1.0
     */
    public function __construct($message = null, Exception $previous = null)
    {
        if (!$message) {
            $message = 'Request time limit exceeded';
        }
        parent::__construct($message, 0, $previous);
    }
}
