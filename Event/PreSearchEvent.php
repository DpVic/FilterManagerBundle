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

use ONGR\FilterManagerBundle\Search\SearchRequest;
use Symfony\Contracts\EventDispatcher\Event;

class PreSearchEvent extends Event
{

    private SearchRequest $searchRequest;


    public function __construct(SearchRequest $searchRequest)
    {
        $this->searchRequest = $searchRequest;
    }


    public function getSearchRequest(): SearchRequest
    {
        return $this->searchRequest;
    }
}
