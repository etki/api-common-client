<?php

namespace Etki\Api\Common\Client\Transport\Http;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Etki\Api\Common\Client\Transport\Http\Listener\RequestListenerInterface;
use Etki\Api\Common\Client\Transport\Http\Listener\ResponseListenerInterface;
use Etki\Api\Common\Client\Transport\Http\Filter\RequestFilterInterface;
use Etki\Api\Common\Client\Transport\Http\Filter\ResponseFilterInterface;

/**
 * Abstract transport with all basic functionality all other transports may
 * need.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Transport\Http
 * @author  Etki <etki@etki.name>
 */
abstract class AbstractTransport implements
    TransportInterface,
    ListenerAwareTransportInterface
{
    /**
     * Proxy setting.
     *
     * @type string
     * @since 0.1.0
     */
    private $proxy;
    /**
     * Default timeout.
     *
     * @type int
     * @since 0.1.0
     */
    private $defaultTimeout = 10000;
    /**
     * List of request listeners.
     *
     * @type RequestListenerInterface[]
     * @since 0.1.0
     */
    private $requestListeners = array();
    /**
     * List of response listeners.
     *
     * @type ResponseListenerInterface[]
     * @since 0.1.0
     */
    private $responseListeners = array();
    /**
     * Filters that process request before it is passed to listeners.
     *
     * @type RequestFilterInterface[]
     * @since 0.1.0
     */
    private $requestListenFilters = array();
    /**
     * Filters that process response before it is passed to listeners.
     *
     * @type ResponseFilterInterface[]
     * @since 0.1.0
     */
    private $responseListenFilters = array();

    /**
     * Sets proxy.
     *
     * @param string $proxy Proxy to set.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function setProxy($proxy)
    {
        $this->proxy = $proxy;
        return $this;
    }

    /**
     * Returns proxy setting.
     *
     * @return string
     * @since 0.1.0
     */
    public function getProxy()
    {
        return $this->proxy;
    }

    /**
     * Sets default timeout.
     *
     * @param int $defaultTimeout New timeout in milliseconds.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function setDefaultTimeout($defaultTimeout)
    {
        $this->defaultTimeout = $defaultTimeout;
        return $this;
    }

    /**
     * Returns current default timeout setting.
     *
     * @return int Default timeout in milliseconds.
     * @since 0.1.0
     */
    public function getDefaultTimeout()
    {
        return $this->defaultTimeout;
    }

    /**
     * Adds new listener.
     *
     * @param RequestListenerInterface $listener Listener to add.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function addRequestListener(RequestListenerInterface $listener)
    {
        if (!in_array($listener, $this->requestListeners, true)) {
            $this->requestListeners[] = $listener;
        }
        return $this;
    }

    /**
     * Adds response listener.
     *
     * @param ResponseListenerInterface $listener Response listener to add.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function addResponseListener(ResponseListenerInterface $listener)
    {
        if (!in_array($listener, $this->responseListeners, true)) {
            $this->responseListeners[] = $listener;
        }
        return $this;
    }

    /**
     * Adds response listen filter.
     *
     * @param ResponseFilterInterface $filter Filter to add.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function addResponseListenFilter(ResponseFilterInterface $filter)
    {
        if (!in_array($filter, $this->responseListenFilters, true)) {
            $this->responseListenFilters[] = $filter;
        }
        return $this;
    }

    /**
     * Adds request listen filter.
     *
     * @param RequestFilterInterface $filter Filter to add.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function addRequestListenFilter(RequestFilterInterface $filter)
    {
        if (!in_array($filter, $this->requestListenFilters, true)) {
            $this->requestListenFilters[] = $filter;
        }
        return $this;
    }

    /**
     * Passes HTTP request to listeners.
     *
     * @param Request $request Request object.
     *
     * @return void
     * @since 0.1.0
     */
    protected function observeRequest(Request $request)
    {
        // preserving original request
        $request = clone $request;
        foreach ($this->requestListenFilters as $filter) {
            $request = $filter->filterRequest($request);
        }
        foreach ($this->requestListeners as $listener) {
            $listener->observeRequest($request);
        }
    }

    /**
     * Passes HTTP response to listeners.
     *
     * @param Response $response Response object.
     *
     * @return void
     * @since 0.1.0
     */
    protected function observeResponse(Response $response)
    {
        // preserving original response untouched
        $response = clone $response;
        foreach ($this->responseListenFilters as $filter) {
            $response = $filter->filterResponse($response);
        }
        foreach ($this->responseListeners as $listener) {
            $listener->observeResponse($response);
        }
    }
}
