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

namespace ONGR\FilterManagerBundle\Filter\ViewData;

use ONGR\FilterManagerBundle\SerializableInterface;

/**
 * This class holds data for filter choice.
 */
class ChoiceAwareViewData implements SerializableInterface
{

    private bool $active = false;


    private bool $default = false;

    /**
     * Holds set or unset parameters depending on state.
     */
    private array $urlParameters = [];

    /**
     */
    private string $label;

    /**
     * Sorting any arrays: "min", "max", for only numeric arrays: "avg", "sum".
     */
    private ?string $mode = null;

    /**
     * Represents document count for option.
     */
    private int $count = 0;


    public function isActive(): bool
    {
        return $this->active;
    }


    public function setActive(bool $active): void
    {
        $this->active = $active;
    }


    public function isDefault(): bool
    {
        return $this->default;
    }


    public function setDefault(bool $default): void
    {
        $this->default = $default;
    }


    public function getCount(): int
    {
        return $this->count;
    }


    public function setCount(int $count)
    {
        $this->count = $count;
    }


    public function getLabel(): string
    {
        return $this->label;
    }


    public function setLabel(string $label): void
    {
        $this->label = $label;
    }


    public function getUrlParameters(): array
    {
        return $this->urlParameters;
    }


    public function setUrlParameters(array $urlParameters): void
    {
        $this->urlParameters = $urlParameters;
    }


    public function getMode(): ?string
    {
        return $this->mode;
    }


    public function setMode(string $mode = null): void
    {
        $this->mode = $mode;
    }


    /**
     * {@inheritdoc}
     */
    public function getSerializableData(): array
    {
        return [
            'active' => $this->isActive(),
            'default' => $this->isDefault(),
            'url_params' => $this->getUrlParameters(),
            'label' => $this->getLabel(),
            'mode' => $this->getMode(),
            'count' => $this->getCount(),
        ];
    }
}
