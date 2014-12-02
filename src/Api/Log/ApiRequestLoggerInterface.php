<?php

namespace Etki\Api\Common\Client\Api\Log;

use Etki\Api\Common\Client\Api\ApiRequestInterface;

/**
 * This interface describes API request logger.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Api\Log
 * @author  Etki <etki@etki.name>
 */
interface ApiRequestLoggerInterface
{
    /**
     * Logs API request.
     *
     * @param ApiRequestInterface $apiRequest Request to log.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function logApiRequest(ApiRequestInterface $apiRequest);
}
