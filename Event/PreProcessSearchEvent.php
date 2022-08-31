<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ONGR\FilterManagerBundle\Event;

use ONGR\ElasticsearchDSL\Search;
use ONGR\FilterManagerBundle\Filter\FilterState;
use Symfony\Contracts\EventDispatcher\Event;

class PreProcessSearchEvent extends Event
{

    private FilterState $state;

    private Search $relatedSearch;


    public function __construct(FilterState $state, Search $relatedSearch)
    {
        $this->state = $state;
        $this->relatedSearch = $relatedSearch;
    }


    public function getState(): FilterState
    {
        return $this->state;
    }


    public function getRelatedSearch(): Search
    {
        return $this->relatedSearch;
    }
}
