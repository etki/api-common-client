<?php

namespace Etki\Api\Common\Client\Transport;

/**
 * This interface describes HTTP request logger.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Transport
 * @author  Etki <etki@etki.name>
 */
interface HttpRequestLoggerInterface
{
    /**
     * Logs HTTP request.
     *
     * @param HttpRequestInterface $request Request to log.
     *
     * @return mixed
     * @since 0.1.0
     */
    public function logHttpRequest(HttpRequestInterface $request);
}
