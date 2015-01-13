<?php

namespace Etki\Api\Common\Client\Transport\Http\Listener;

use Symfony\Component\HttpFoundation\Request;

/**
 * Simple HTTP request listener interface.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Transport\Http
 * @author  Etki <etki@etki.name>
 */
interface RequestListenerInterface
{
    /**
     * Observes HTTP request.
     *
     * @param Request $request Request to observe.
     *
     * @return void
     * @since 0.1.0
     */
    public function observeRequest(Request $request);
}
