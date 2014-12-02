<?php

namespace Etki\Api\Common\Client\Transport;

use Etki\Api\Common\Client\Exception\Transport\RequestFailedException;
use Guzzle\Http\Client;
use Guzzle\Http\Exception\RequestException;

/**
 * HTTP transport implementation.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Transport
 * @author  Etki <etki@etki.name>
 */
class GuzzleTransport implements
    HttpTransportInterface,
    ProxyAwareHttpTransportInterface,
    LoggerAwareHttpTransportInterface/*,
    AuthAwareHttpTransportInterface*/
{
    /**
     * Guzzle client.
     *
     * @type Client
     * @since 0.1.0
     */
    protected $client;
    /**
     * Proxy definition.
     *
     * @type string
     * @since 0.1.0
     */
    protected $proxy;
    /**
     * HTTP basic auth data.
     *
     * @type string[] [username, password]
     * @since 0.1.0
     */
    protected $auth;
    /**
     * Request timeout.
     *
     * @type int|float
     * @since 0.1.0
     */
    protected $timeout = 1;
    /**
     * Attached loggers.
     *
     * @type HttpLoggerInterface[]
     * @since 0.1.0
     */
    protected $loggers = array();

    /**
     * Initializer
     *
     * @return self
     * @since 0.1.0
     */
    public function __construct()
    {
        $this->client = new Client;
    }

    /**
     * Sends HTTP request.
     *
     * @param HttpRequestInterface $httpRequest Request.
     *
     * @return HttpResponse Response.
     * @since 0.1.0
     */
    public function sendRequest(HttpRequestInterface $httpRequest)
    {
        $guzzleRequest = $this->client->createRequest(
            $httpRequest->getHttpMethod(),
            $this->formUrl($httpRequest),
            $httpRequest->getHttpHeaders(),
            $httpRequest->getBody(),
            $this->getGuzzleRequestOptions()
        );
        try {
            $guzzleResponse = $guzzleRequest->send();
        } catch (RequestException $exception) {
            $message = sprintf(
                'Failed to perform `%s` request to `%s`',
                $httpRequest->getHttpMethod(),
                $this->formUrl($httpRequest)
            );
            throw new RequestFailedException($message, 0, $exception);
        }
        $httpResponse = new HttpResponse;
        $httpResponse->setBody($guzzleResponse->getBody(true));
        $httpResponse->setHttpHeaders($guzzleResponse->getHeaders());
        $httpResponse->setHttpStatusCode($guzzleResponse->getStatusCode());
        $httpResponse->setHttpStatusMessage($guzzleResponse->getReasonPhrase());
        return $httpResponse;
    }

    /**
     * Returns request options.
     *
     * @return array Options.
     * @since 0.1.0
     */
    protected function getGuzzleRequestOptions()
    {
        $options = array();
        if (isset($this->proxy)) {
            $options['proxy'] = $this->proxy;
        }
        if (isset($this->auth)) {
            $options['auth'] = $this->auth;
        }
        return $options;
    }

    /**
     * Forms URL out from single request.
     *
     * @param HttpRequestInterface $request Request to analyze.
     *
     * @return string URL.
     * @since 0.1.0
     */
    protected function formUrl(HttpRequestInterface $request)
    {
        if (!$request->getQueryParameters()) {
            return $request->getUrl();
        }
        $params = http_build_query($request->getQueryParameters());
        return $request->getUrl() . '?' . $params;
    }

    /**
     * Sets proxy data.
     *
     * @param string $proxy Proxy to set.
     *
     * @return void
     * @since 0.1.0
     */
    public function setProxy($proxy)
    {
        $this->proxy = $proxy;
    }

    /**
     * Sets authentication data.
     *
     * @param string $username Username to set.
     * @param string $password Password to set.
     *
     * @return void
     * @since 0.1.0
     */
//    public function setAuth($username, $password)
//    {
//        $this->auth = array($username, $password);
//    }
    /**
     * Sets timeout. If value lower than 0.1 will be passed, 0.1 will be set.
     *
     * @param float|int $seconds
     *
     * @return $this
     * @since 0.1.0
     */
    public function setTimeout($seconds)
    {
        $seconds = max(0.1, $seconds);
        $this->timeout = $seconds;
        return $this;
    }

    /**
     * Attaches new logger.
     *
     * @param HttpLoggerInterface $logger Logger to attach
     *
     * @return $this
     * @since 0.1.0
     */
    public function attachHttpLogger(HttpLoggerInterface $logger)
    {
        if (!in_array($logger, $this->loggers)) {
            $this->loggers[] = $logger;
        }
        return $this;
    }

    /**
     * Detaches logger by value.
     *
     * @param HttpLoggerInterface $logger
     *
     * @return $this
     * @since 0.1.0
     */
    public function detachHttpLogger(HttpLoggerInterface $logger)
    {
        foreach ($this->loggers as $key => $storedLogger) {
            if ($storedLogger === $logger) {
                array_splice($this->loggers, $key, 1);
                break;
            }
        }
    }

    /**
     * Removes last logger.
     *
     * @todo validation in case there are no HTTP loggers
     *
     * @return HttpLoggerInterface
     * @since 0.1.0
     */
    public function popHttpLogger()
    {
        return array_pop($this->loggers);
    }

    /**
     * Logs HTTP request.
     *
     * @param HttpRequestInterface $request Request to log.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    protected function logHttpRequest(HttpRequestInterface $request)
    {
        foreach ($this->loggers as $logger) {
            $logger->logHttpRequest($request);
        }
        return $this;
    }

    /**
     * Logs HTTP response.
     *
     * @param HttpResponseInterface $response Response to log.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    protected function logHttpResponse(HttpResponseInterface $response)
    {
        foreach ($this->loggers as $logger) {
            $logger->logHttpResponse($response);
        }
        return $this;
    }
}
