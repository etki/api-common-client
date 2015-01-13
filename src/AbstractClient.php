<?php

namespace Etki\Api\Common\Client;

use Etki\Api\Common\Client\Entity\Credentials;

/**
 * Abstract client class.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client
 * @author  Etki <etki@etki.name>
 */
abstract class AbstractClient
{
    /**
     * Base URL.
     *
     * @type string
     * @since 0.1.0
     */
    private $baseUrl;
    /**
     * Connection credentials.
     *
     * @type Credentials|null
     * @since 0.1.0
     */
    private $credentials;

    /**
     * Initializer.
     *
     * @param string      $baseUrl     Base url.
     * @param Credentials $credentials Connection credentials.
     *
     * @return self
     * @since 0.1.0
     */
    public function __construct($baseUrl, Credentials $credentials = null)
    {
        $this->baseUrl = $baseUrl;
        $this->credentials = $credentials;
    }

    /**
     * Retrieves base url.
     *
     * @return string
     * @since 0.1.0
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * Returns credentials.
     *
     * @return Credentials|null
     * @since 0.1.0
     */
    protected function getCredentials()
    {
        return $this->credentials;
    }
}
