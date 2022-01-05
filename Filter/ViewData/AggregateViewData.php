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

use ONGR\FilterManagerBundle\Filter\ViewData;

/**
 * This class represents view data with aggregated choices.
 */
class AggregateViewData extends ViewData
{
    /**
     * @var ChoicesAwareViewData[]
     */
    private array $items = [];


    /**
     * @return array<int,ChoiceAwareViewData>
     */
    public function getItems(): array
    {
        return $this->items;
    }


    /**
     * @param array<int,ChoicesAwareViewData> $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }


    public function addItem(ChoicesAwareViewData $item): void
    {
        $this->items[] = $item;
    }


    public function sortItems(callable $callback = null): void
    {
        if ($callback === null) {
            $callback = function ($a, $b) {
                return strcmp($a->getName(), $b->getName());
            };
        }

        usort($this->items, $callback);
    }
}
