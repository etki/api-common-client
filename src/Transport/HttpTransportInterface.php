<?php

namespace Etki\Api\Common\Client\Transport;

/**
 * Interface for HTTP transport
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Transport
 * @author  Etki <etki@etki.name>
 */
interface HttpTransportInterface
{
    /**
     * Sends request.
     *
     * @param HttpRequestInterface $httpRequest
     *
     * @return HttpResponseInterface Response.
     * @since 0.1.0
     */
    public function sendRequest(HttpRequestInterface $httpRequest);
    /**
     * Sets timeout.
     *
     * @param int|float $seconds Amount of seconds. Should be set to 0.1 if real
     *                           value will be lower.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function setTimeout($seconds);
}
