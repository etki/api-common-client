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
     * @param HttpRequestInterface $request
     *
     * @return HttpResponseInterface Response.
     * @since 0.1.0
     */
    public function sendRequest(HttpRequestInterface $request);
}
