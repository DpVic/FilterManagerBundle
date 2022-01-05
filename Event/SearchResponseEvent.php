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

use ONGR\ElasticsearchBundle\Result\DocumentIterator;
use Symfony\Contracts\EventDispatcher\Event;

class SearchResponseEvent extends Event
{

    private DocumentIterator $documentIterator;


    public function __construct(DocumentIterator $documentIterator)
    {
        $this->documentIterator = $documentIterator;
    }


    public function getDocumentIterator(): DocumentIterator
    {
        return $this->documentIterator;
    }
}
