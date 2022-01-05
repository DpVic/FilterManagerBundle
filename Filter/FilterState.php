<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ONGR\FilterManagerBundle\Filter;

use ONGR\FilterManagerBundle\Filter\Helper\OptionsAwareTrait;
use ONGR\FilterManagerBundle\SerializableInterface;

/**
 * This class defines data structure to represent filter state.
 */
class FilterState implements SerializableInterface
{

    use OptionsAwareTrait;

    /**
     * @var bool True if filter is currently.
     */
    private bool $active = false;

    /**
     * @var mixed Represents user selected value for filtering.
     */
    private $value;

    /**
     * @var array Url parameters related *only* to given filter.
     */
    private array $urlParameters = [];

    /**
     * @var string Filter name.
     */
    private string $name;


    public function isActive(): bool
    {
        return $this->active;
    }


    public function setActive(bool $active): void
    {
        $this->active = $active;
    }


    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }


    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }


    public function getUrlParameters(): array
    {
        return $this->urlParameters;
    }


    public function setUrlParameters(array $urlParameters): void
    {
        $this->urlParameters = $urlParameters;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function setName(string $name): void
    {
        $this->name = $name;
    }


    /**
     * {@inheritdoc}
     */
    public function getSerializableData(): array
    {
        return [
            'active' => $this->active,
            'value' => $this->value,
        ];
    }
}
