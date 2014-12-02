<?php

namespace Etki\Api\Common\Client\Api\Log;

use Etki\Api\Common\Client\Api\ApiResponseInterface;

/**
 * This interface describes API response logger.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Api\Log
 * @author  Etki <etki@etki.name>
 */
interface ApiResponseLoggerInterface
{
    /**
     * Logs API response.
     *
     * @param ApiResponseInterface $apiResponse API response to log.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function logApiResponse(ApiResponseInterface $apiResponse);
}
