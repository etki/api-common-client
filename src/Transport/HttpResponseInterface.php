<?php

namespace Etki\Api\Common\Client\Transport;

/**
 * This interface specifies common HTTP response.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Transport
 * @author  Etki <etki@etki.name>
 */
interface HttpResponseInterface
{
    /**
     * Returns request body.
     *
     * @return string
     * @since 0.1.0
     */
    public function getBody();

    /**
     * Returns all headers.
     *
     * @return array Headers in [header => value] form.
     * @since 0.1.0
     */
    public function getHttpHeaders();

    /**
     * Returns HTTP status code.
     *
     * @return int
     * @since 0.1.0
     */
    public function getHttpStatusCode();

    /**
     * Returns HTTP status message (if any specified).
     *
     * @return string
     * @since 0.1.0
     */
    public function getHttpStatusMessage();

    /**
     * Sets response body.
     *
     * @param string $body Body to set.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function setBody($body);

    /**
     * Sets HTTP headers in [header => value] format.
     *
     * @param string[][] $headers HTTP headers.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function setHttpHeaders(array $headers);

    /**
     * Sets HTTP status code.
     *
     * @param int $statusCode HTTP status code.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function setHttpStatusCode($statusCode);

    /**
     * Sets HTTP status message.
     *
     * @param string $message Sets HTTP status message.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function setHttpStatusMessage($message);
}
