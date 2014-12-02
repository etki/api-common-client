<?php

namespace Etki\Api\Common\Client\Transport;

/**
 * This interface specifies logger-aware HTTP transport methods.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Transport
 * @author  Etki <etki@etki.name>
 */
interface LoggerAwareHttpTransportInterface
{
    /**
     * Sets logger.
     *
     * @param HttpLoggerInterface $logger Logger to set.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function attachHttpLogger(HttpLoggerInterface $logger);

    /**
     * Detaches logger.
     *
     * @param HttpLoggerInterface $logger Logger to detach.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function detachHttpLogger(HttpLoggerInterface $logger);

    /**
     * Removes last logger from stack.
     *
     * @return HttpLoggerInterface Popped-out logger.
     * @since 0.1.0
     */
    public function popHttpLogger();
}
