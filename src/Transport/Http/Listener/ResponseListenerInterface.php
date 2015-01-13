<?php

namespace Etki\Api\Common\Client\Transport\Http\Listener;

use Symfony\Component\HttpFoundation\Response;

/**
 * Simple HTTP response listener interface.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Transport\Http
 * @author  Etki <etki@etki.name>
 */
interface ResponseListenerInterface
{

    /**
     * Observes HTTP response.
     *
     * @param Response $response Response to observe.
     *
     * @return void
     * @since 0.1.0
     */
    public function observeResponse(Response $response);
}
