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
 * This trait defines methods for choices sorting.
 */
trait SortAwareTrait
{
    use OptionsAwareTrait;


    public function getSortType(string $default = '_count'):string
    {
        return $this->getOption('sort_type', $default);
    }


    public function getSortOrder(string $default = 'asc'): string
    {
        return $this->getOption('sort_order', $default);
    }


    public function getSortPriority(array $default = []): array
    {
        return $this->getOption('sort_priority', $default);
    }
}
