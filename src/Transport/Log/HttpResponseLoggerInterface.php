<?php

namespace Etki\Api\Common\Client\Transport;

/**
 * This interface describes logger that can log HTTP response.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Transport
 * @author  Etki <etki@etki.name>
 */
interface HttpResponseLoggerInterface
{
    /**
     * Logs response.
     *
     * @param HttpResponseInterface $response Response to log.
     *
     * @return mixed
     * @since 0.1.0
     */
    public function logHttpResponse(HttpResponseInterface $response);
}
