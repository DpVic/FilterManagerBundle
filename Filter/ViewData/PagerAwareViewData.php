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

use ONGR\FilterManagerBundle\Filter\Helper\OptionsAwareTrait;
use ONGR\FilterManagerBundle\Filter\ViewData;

/**
 * This class represents view data with page choices.
 */
class PagerAwareViewData extends ViewData
{
    use OptionsAwareTrait;

    /**
     * @var int Current page.
     */
    private int $currentPage = 1;

    /**
     * @var int Total amount of items to show.
     */
    private int $totalItems = 1;

    /**
     * @var int Maximum pages to show.
     */
    private int $maxPages = 10;

    /**
     * @var int Maximum items show per page.
     */
    private int $itemsPerPage = 12;

    /**
     * @var int of pages to show.
     */
    private int $numPages;


    /**
     * Initializes data for pagination.
     */
    public function setData(int $totalItems, int $currentPage, int $itemsPerPage = 12, int $maxPages = 10)
    {
        $this->totalItems = $totalItems;
        $this->currentPage = $currentPage;
        $this->itemsPerPage = $itemsPerPage;
        $this->numPages = (int)ceil($this->totalItems / $this->itemsPerPage);

        $this->maxPages = max($maxPages, 3);
    }


    /**
     * {@inheritdoc}
     */
    public function getSerializableData(): array
    {
        $data = parent::getSerializableData();

        $data['pager'] = [
            'total_items' => $this->totalItems,
            'num_pages' => $this->numPages,
            'first_page' => 1,
            'previous_page' => $this->getPreviousPage(),
            'current_page' => $this->currentPage,
            'next_page' => $this->getNextPage(),
            'last_page' => $this->numPages,
        ];

        return $data;
    }


    /**
     * Get previous page number.
     *
     * @return int|null
     */
    public function getPreviousPage(): ?int
    {
        if ($this->currentPage > 1) {
            return $this->currentPage - 1;
        }

        return null;
    }


    /**
     * Returns current page number.
     *
     * @return int
     */
    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }


    /**
     * Get next page number.
     *
     * @return int|null
     */
    public function getNextPage(): ?int
    {
        if ($this->currentPage < $this->numPages) {
            return $this->currentPage + 1;
        }

        return null;
    }


    /**
     * Returns the last page number.
     *
     * @return int
     */
    public function getLastPage(): int
    {
        return (int)ceil($this->totalItems / $this->itemsPerPage);
    }


    /**
     * Returns true if the current page is first.
     *
     * @return bool
     */
    public function isFirstPage(): bool
    {
        return $this->currentPage == 1;
    }


    /**
     * Returns the first page number.
     *
     * @return int
     */
    public function getFirstPage(): int
    {
        return 1;
    }


    /**
     * Returns true if the current page is last.
     *
     * @return bool
     */
    public function isLastPage(): bool
    {
        return $this->currentPage == $this->getLastPage();
    }


    /**
     * @return int
     */
    private function calculateAdjacent(): int
    {
        $minus = $this->maxPages === 2 ? 0 : 1;

        return (int)floor(($this->maxPages - $minus) / 2);
    }


    /**
     * Generates a page list.
     *
     * @return array The page list.
     */
    public function getPages(): array
    {
        // Reserve one position for first/last page
        $this->maxPages--;

        $start = 1;
        $numAdjacents = $this->calculateAdjacent();

        if ($this->currentPage - $numAdjacents < $start) {
            $begin = $start;
            $end = min($this->numPages, $this->maxPages);
        } elseif ($this->currentPage + $numAdjacents > $this->numPages) {
            $begin = max($start, $this->numPages - $this->maxPages + 1);
            $end = $this->numPages;
        } else {
            $begin = $this->currentPage - $numAdjacents + ($this->maxPages % 2);
            $end = $this->currentPage + $numAdjacents;
        }

        return array_unique(array_merge([1], range($begin, $end, 1), [$this->numPages]));
    }
}
