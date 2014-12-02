<?php

namespace Etki\Api\Common\Client\Transport;

/**
 * Describes transport that can into proxies.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Transport
 * @author  Etki <etki@etki.name>
 */
interface ProxyAwareHttpTransportInterface
{
    /**
     * Sets proxy.
     *
     * @param string $proxy Proxy definition.
     *
     * @return void
     * @since 0.1.0
     */
    public function setProxy($proxy);
}
