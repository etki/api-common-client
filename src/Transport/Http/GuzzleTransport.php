<?php

namespace Etki\Api\Common\Client\Transport\Http;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request as HttpRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Guzzle\Http\Client as GuzzleClient;

/**
 * Guzzle transport.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Transport\Http
 * @author  Etki <etki@etki.name>
 */
class GuzzleTransport extends AbstractTransport
{
    /**
     * Guzzle handle.
     *
     * @type GuzzleClient
     * @since 0.1.0
     */
    private $guzzleClient;

    /**
     * Sends request.
     *
     * @param HttpRequest $request Request to send.
     * @param int         $timeout Optional timeout. Default one will be used if
     *                             not set.
     *
     * @return HttpResponse
     * @since 0.1.0
     */
    public function sendRequest(HttpRequest $request, $timeout = null)
    {
        $this->observeRequest($request);
        $guzzleClient = $this->getGuzzleClient();
        $timeout = $timeout ? $timeout : $this->getDefaultTimeout();
        $options = array(
            'timeout' => $timeout / 1000,
            'exceptions' => false,
        );
        if ($this->getProxy()) {
            $options['proxy'] = $this->getProxy();
        }
        $guzzleRequest = $guzzleClient->createRequest(
            $request->getMethod(),
            $request->getUri(),
            $request->headers->all(),
            $request->getContent(),
            $options
        );
        $guzzleResponse = $guzzleRequest->send();
        $response = new HttpResponse(
            $guzzleResponse->getBody(true),
            $guzzleResponse->getStatusCode(),
            $guzzleResponse->getHeaders()->getAll()
        );
        $this->observeResponse($response);
        return $response;
    }

    /**
     * Adds guzzle subscriber (plugin).
     *
     * @param EventSubscriberInterface $subscriber Subscriber to add.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function addSubscriber(EventSubscriberInterface $subscriber)
    {
        $this->getGuzzleClient()->addSubscriber($subscriber);
        return $this;
    }

    /**
     * Retrieves guzzle client.
     *
     * @return GuzzleClient
     * @since 0.1.0
     */
    protected function getGuzzleClient()
    {
        if (!isset($this->guzzleClient)) {
            $this->guzzleClient = new GuzzleClient;
        }
        return $this->guzzleClient;
    }
}
