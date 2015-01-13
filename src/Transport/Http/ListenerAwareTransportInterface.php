<?php

namespace Etki\Api\Common\Client\Transport\Http;

use Etki\Api\Common\Client\Transport\Http\Filter\RequestFilterInterface;
use Etki\Api\Common\Client\Transport\Http\Filter\ResponseFilterInterface;
use Etki\Api\Common\Client\Transport\Http\Listener\RequestListenerInterface;
use Etki\Api\Common\Client\Transport\Http\Listener\ResponseListenerInterface;

/**
 * Describes transport that is capable of adding listeners.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Transport\Http
 * @author  Etki <etki@etki.name>
 */
interface ListenerAwareTransportInterface
{
    /**
     * Adds request listener.
     *
     * @param RequestListenerInterface $listener Request listener.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function addRequestListener(RequestListenerInterface $listener);

    /**
     * Adds response listener.
     *
     * @param ResponseListenerInterface $listener Response listener.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function addResponseListener(ResponseListenerInterface $listener);

    /**
     * Adds request filter.
     *
     * @param RequestFilterInterface $filter Request filter.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function addRequestListenFilter(RequestFilterInterface $filter);

    /**
     * Adds response filter.
     *
     * @param ResponseFilterInterface $filter Response filter.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function addResponseListenFilter(ResponseFilterInterface $filter);
}
