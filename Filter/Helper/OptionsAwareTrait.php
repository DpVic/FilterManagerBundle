<?php

declare(strict_types=1);

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ONGR\FilterManagerBundle\Filter\Helper;

/**
 * A trait which handles the behavior of options in filters.
 */
trait OptionsAwareTrait
{
    /**
     * @var array
     */
    private array $options = [];


    /**
     * Checks if parameter exists.
     */
    public function hasOption($name): bool
    {
        return isset($this->options[$name]);
    }


    /**
     * Removes parameter.
     */
    public function removeOption(string $name): void
    {
        if ($this->hasOption($name)) {
            unset($this->options[$name]);
        }
    }


    /**
     * Returns one parameter by it's name.
     * @return mixed
     */
    public function getOption(string $name, $default = null)
    {
        if ($this->hasOption($name)) {
            return $this->options[$name];
        }
        return $default;
    }


    /**
     * Returns an array of all options.
     *
     */
    public function getOptions(): array
    {
        return $this->options;
    }


    /**
     * @param string $name
     * @param array|string|\stdClass $value
     */
    public function addOption($name, $value): void
    {
        $this->options[$name] = $value;
    }


    /**
     * Sets an array of options.
     */
    public function setOptions(array $options): void
    {
        $this->options = $options;
    }
}
