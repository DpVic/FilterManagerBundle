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

use ONGR\FilterManagerBundle\SerializableInterface;

/**
 * This class defines data structure passed into view by single filter.
 */
class ViewData implements SerializableInterface
{
    private FilterState $state;

    private array $tags = [];

    private array $urlParameters;

    private array $resetUrlParameters;

    private string $name;


    public function getName(): string
    {
        return $this->name;
    }


    public function setName(string $name): void
    {
        $this->name = $name;
    }


    public function getResetUrlParameters(): array
    {
        return $this->resetUrlParameters;
    }


    public function setResetUrlParameters(array $resetUrlParameters): void
    {
        $this->resetUrlParameters = $resetUrlParameters;
    }


    public function getState(): FilterState
    {
        return $this->state;
    }


    public function setState(FilterState $state): void
    {
        $this->state = $state;
    }


    public function getTags(): array
    {
        return $this->tags;
    }


    public function hasTag(string $tag): bool
    {
        return in_array($tag, $this->tags, true);
    }


    public function setTags(array $tags): void
    {
        $this->tags = $tags;
    }


    public function getUrlParameters(): array
    {
        return $this->urlParameters;
    }


    public function setUrlParameters(array $urlParameters): void
    {
        $this->urlParameters = $urlParameters;
    }


    public function getSerializableData(): array
    {
        return [
            'name' => $this->name,
            'state' => $this->getState()->getSerializableData(),
            'tags' => $this->tags,
            'url_params' => $this->urlParameters,
            'reset_url_params' => $this->resetUrlParameters,
        ];
    }
}
