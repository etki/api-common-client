<?php

namespace Etki\Api\Common\Client\Api;

use Etki\Api\Common\Client\Transport\HttpTransportInterface;

/**
 * API manager.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Api
 * @author  Etki <etki@etki.name>
 */
class ApiManager
{
    /**
     * Used transport.
     *
     * @type HttpTransportInterface
     * @since 0.1.0
     */
    protected $transport;
    /**
     * Magic converter that translates API/HTTP requests/responses.
     *
     * @type ApiHttpConverterInterface
     * @since 0.1.0
     */
    protected $converter;

    /**
     * Sets request-response transport.
     *
     * @param HttpTransportInterface $transport Transport.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function setTransport(HttpTransportInterface $transport)
    {
        $this->transport = $transport;
        return $this;
    }

    /**
     * Sets API/HTTP converter.
     *
     * @param ApiHttpConverterInterface $converter Converter.
     *
     * @return $this Current instance.
     * @since 0.10
     */
    public function setConverter(ApiHttpConverterInterface $converter)
    {
        $this->converter = $converter;
        return $this;
    }

    /**
     * Sends API request.
     *
     * @param ApiRequestInterface $apiRequest API request.
     *
     * @return ApiResponseInterface Response.
     * @since 0.1.0
     */
    public function sendRequest(ApiRequestInterface $apiRequest)
    {
        $httpRequest = $this->converter->convertApiRequest($apiRequest);
        $httpResponse = $this->transport->sendRequest($httpRequest);
        return $this->converter->convertHttpResponse($httpResponse);
    }
}
