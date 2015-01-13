<?php

namespace Etki\Api\Common\Client\Transport\Http;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Basic transport interface.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Transport\Http
 * @author  Etki <etki@etki.name>
 */
interface TransportInterface
{
    /**
     * Sends request.
     *
     * @param Request $request Request to send.
     * @param int     $timeout Request timeout in milliseconds.
     *
     * @return Response Response returned by API.
     * @since 0.1.0
     */
    public function sendRequest(Request $request, $timeout = null);
}
