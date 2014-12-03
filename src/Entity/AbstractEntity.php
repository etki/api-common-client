<?php

namespace Etki\Api\Common\Client\Entity;

use BadMethodCallException;

/**
 * This is base class for entities that may be used in project. Usually APIs
 * reuse data structures (users, messages, etc) that can easily be wrapped in
 * *Entity* class that may enlighten validation and early error catching.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Common\Client\Entity
 * @author  Etki <etki@etki.name>
 */
abstract class AbstractEntity
{
    /**
     * Magic getter-setter.
     *
     * @param string $methodName Name of the called method.
     * @param array  $args       List of arguments.
     *
     * @return $this|mixed Current instance (for setters) or unpredictable value
     * (for getters).
     * @since 0.1.0
     */
    public function __call($methodName, array $args)
    {
        $prefix = substr($methodName, 0, 3);
        $suffix = strtolower(substr($methodName, 3, 1)) .
            substr($methodName, 4);
        if (!in_array($prefix, array('get', 'set',)) || !$suffix) {
            $message = sprintf('Unknown method `%s()`', $methodName);
            throw new BadMethodCallException($message);
        }
        if ($prefix === 'set' && sizeof($args) < 1) {
            $message = sprintf(
                'Setter `%s()` takes exactly one argument',
                $methodName
            );
            throw new BadMethodCallException($message);
        }
        if ($prefix === 'set') {
            $this->$suffix = $args[0];
            return $this;
        }
        return $this->$suffix;
    }

    /**
     * Asserts that particular property is set.
     *
     * @param string $propertyName Property that has to be checked.
     *
     * @return void
     * @since 0.1.0
     */
    public function assertPropertySet($propertyName)
    {
        if (!isset($this->$propertyName)) {
            $message = sprintf('Property `%s` isn\'t set', $propertyName);
            throw new BadMethodCallException($message);
        }
    }

    /**
     * Asserts that all properties in passed list are set.
     *
     * @param string[] $propertyNames List of property names.
     *
     * @throws BadMethodCallException Thrown if any of specified properties
     * isn't set.
     *
     * @return void
     * @since 0.1.0
     */
    public function assertPropertiesSet(array $propertyNames)
    {
        $missing = array();
        foreach ($propertyNames as $propertyName) {
            if (!isset($this->$propertyName)) {
                $missing[] = $propertyName;
            }
        }
        if ($missing) {
            $message = 'Following properties weren\'t set: ' .
                implode(', ', $propertyNames);
            throw new BadMethodCallException($message);
        }
    }

    /**
     * Verifies that all properties except for ignored ones are set.
     *
     * @param string[] $propertyNames List of property names to ignore.
     *
     * @throws BadMethodCallException Thrown if any of non-ignored properties
     * isn't set.
     *
     * @return void
     * @since 0.1.0
     */
    public function assertAllPropertiesSetExcept(array $propertyNames)
    {
        $allProperties = array_keys(get_object_vars($this));
        if ($propertyNames) {
            $propertyNames = array_intersect($propertyNames, $allProperties);
            $inspectedProperties = array_diff($allProperties, $propertyNames);
        } else {
            $inspectedProperties = $allProperties;
        }
        $this->assertPropertiesSet($inspectedProperties);
    }

    /**
     * Verifies that all properties are set.
     *
     * @throws BadMethodCallException Thrown if any of properties isn't set,
     *
     * @return void
     * @since 0.1.0
     */
    public function assertAllPropertiesSet()
    {
        $this->assertAllPropertiesSetExcept(array());
    }
}
