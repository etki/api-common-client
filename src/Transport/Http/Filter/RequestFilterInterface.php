<?php

namespace Etki\Api\Common\Client\Transport\Http\Filter;

use Symfony\Component\HttpFoundation\Request;

/**
 * Request listen filter interface.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Transport\Http\Listener
 * @author  Etki <etki@etki.name>
 */
interface RequestFilterInterface
{
    /**
     * Filters request.
     *
     * @param Request $request Request to filter.
     *
     * @return Request The very same filtered request instance.
     * @since 0.1.0
     */
    public function filterRequest(Request $request);
}
