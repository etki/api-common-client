<?php

namespace Etki\Api\Common\Client\Exception\Transport\Http;

use Etki\Api\Common\Client\Exception\Transport\RequestFailedException;
use Exception;

/**
 * Generic HTTP exception.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Exception\Transport\Http
 * @author  Etki <etki@etki.name>
 */
class HttpErrorException extends RequestFailedException
{
    /**
     * HTTP status code.
     *
     * @type int
     * @since 0.1.0
     */
    private $statusCode;
    /**
     * HTTP status message.
     *
     * @type string
     * @since 0.1.0
     */
    private $statusMessage;

    /**
     * Initializer.
     *
     * @param string    $statusCode    HTTP status code.
     * @param string    $statusMessage HTTP status message.
     * @param string    $message       Exception message as it has to appear on
     *                                 stack trace.
     * @param Exception $previous      Previous exception.
     * @param int       $code          Exception code.
     *
     * @return self
     * @since 0.1.0
     */
    public function __construct(
        $statusCode,
        $statusMessage = null,
        $message = null,
        Exception $previous = null,
        $code = 0
    ) {
        $this->statusCode = $statusCode;
        $this->statusMessage = $statusMessage;
        parent::__construct($message, $code, $previous);
    }

    /**
     * Returns statusCode.
     *
     * @return int
     * @since 0.1.0
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Returns statusMessage.
     *
     * @return string
     * @since 0.1.0
     */
    public function getStatusMessage()
    {
        return $this->statusMessage;
    }
}
