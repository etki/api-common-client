<?php

namespace Etki\Api\Common\Client\Transport;

/**
 * Describes transport that can use basic http authentication.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Transport
 * @author  Etki <etki@etki.name>
 */
interface AuthAwareHttpTransportInterface
{
    /**
     * Sets auth credentials.
     *
     * @param string $username Username.
     * @param string $password Password.
     *
     * @return void
     * @since 0.1.0
     */
    public function setAuth($username, $password);
}
