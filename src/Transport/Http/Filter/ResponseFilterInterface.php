<?php

namespace Etki\Api\Common\Client\Transport\Http\Filter;

use Symfony\Component\HttpFoundation\Response;

/**
 * Simple interface for filtering listened response.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Transport\Http\Listener
 * @author  Etki <etki@etki.name>
 */
interface ResponseFilterInterface
{
    /**
     * Filters response.
     *
     * @param Response $response Response to filter.
     *
     * @return Response The very same filtered response instance.
     * @since 0.1.0
     */
    public function filterResponse(Response $response);
}
