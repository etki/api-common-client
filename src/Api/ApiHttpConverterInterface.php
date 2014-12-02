<?php

namespace Etki\Api\Common\Client\Api;

use Etki\Api\Common\Client\Transport\HttpResponseInterface;
use Etki\Api\Common\Client\Transport\HttpRequestInterface;

/**
 * This interface describes converter interface for publicly set converters that
 * convert API requests into HTTP requests and HTTP responses into API
 * responses.
 *
 * @api
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Api
 * @author  Etki <etki@etki.name>
 */
interface ApiHttpConverterInterface
{
    /**
     * Converts API request into HTTP request.
     *
     * @param ApiRequestInterface $apiRequest API request to convert.
     *
     * @return HttpRequestInterface Resulting HTTP request.
     * @since 0.1.0
     */
    public static function convertApiRequest(ApiRequestInterface $apiRequest);

    /**
     * Converts HTTP response into API response.
     *
     * @param HttpResponseInterface $httpResponse
     *
     * @return ApiResponseInterface API response.
     * @since 0.1.0
     */
    public static function convertHttpResponse(
        HttpResponseInterface $httpResponse
    );
}
