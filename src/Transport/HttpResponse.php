<?php

namespace Etki\Api\Common\Client\Transport;

/**
 * Simple HTTP response.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Transport
 * @author  Etki <etki@etki.name>
 */
class HttpResponse implements HttpResponseInterface
{
    /**
     * Headers in [header => value] format.
     *
     * @type array
     * @since 0.1.0
     */
    protected $headers = array();
    /**
     * Response body.
     *
     * @type string
     * @since 0.1.0
     */
    protected $body;
    /**
     * HTTP status message.
     *
     * @type string
     * @since 0.1.0
     */
    protected $statusMessage;
    /**
     * HTTP status code.
     *
     * @type int
     * @since 0.1.0
     */
    protected $statusCode;

    /**
     * {@inheritdoc}
     *
     * @return array Headers in [header => value] format.
     * @since 0.1.0
     */
    public function getHttpHeaders()
    {
        return $this->headers;
    }

    /**
     * {@inheritdoc}
     *
     * @return string Response body.
     * @since 0.1.0
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * {@inheritdoc}
     *
     * @return string HTTP status message.
     * @since 0.1.0
     */
    public function getHttpStatusMessage()
    {
        return $this->statusMessage;
    }

    /**
     * {@inheritdoc}
     *
     * @return int Status code.
     * @since 0.1.0
     */
    public function getHttpStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * {@inheritdoc}
     *
     * @param array $headers HTTP headers in [header => value] form.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function setHttpHeaders(array $headers)
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * Sets response body.
     *
     * @param string $body Response body.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * Sets HTTP status message.
     *
     * @param string $message Status message.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function setHttpStatusMessage($message)
    {
        $this->statusMessage = $message;
        return $this;
    }

    /**
     * Sets HTTP status code.
     *
     * @param int $statusCode HTTP status code.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function setHttpStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }
}
