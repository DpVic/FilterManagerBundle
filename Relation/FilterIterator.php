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

namespace ONGR\FilterManagerBundle\Relation;

use Iterator;

/**
 * This class is able to filter out not related stuff by key and given relation.
 */
class FilterIterator extends \FilterIterator
{
    protected RelationInterface $relation;

    /**
     * @param Iterator          $iterator
     * @param RelationInterface $relation
     */
    public function __construct(Iterator $iterator, RelationInterface $relation)
    {
        parent::__construct($iterator);
        $this->relation = $relation;
    }

    /**
     * {@inheritdoc}
     */
    public function accept(): bool
    {
        return $this->relation->isRelated($this->key());
    }
}
