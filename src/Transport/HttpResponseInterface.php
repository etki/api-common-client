<?php

namespace Etki\Api\Common\Client\Transport;

/**
 * This interface specifies common HTTP response.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Transport
 * @author  Etki <etki@etki.name>
 */
interface HttpResponseInterface
{
    /**
     * Returns request body.
     *
     * @return string
     * @since 0.1.0
     */
    public function getBody();

    /**
     * Returns all headers.
     *
     * @return array Headers in [header => [values]] form.
     * @since 0.1.0
     */
    public function getHeaders();

    /**
     * Returns HTTP status code.
     *
     * @return int
     * @since 0.1.0
     */
    public function getHttpStatusCode();

    /**
     * Returns HTTP status message (if any specified).
     *
     * @return string
     * @since 0.1.0
     */
    public function getHttpStatusMessage();
}
