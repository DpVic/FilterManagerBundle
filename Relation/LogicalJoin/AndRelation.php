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

namespace ONGR\FilterManagerBundle\Relation\LogicalJoin;

use ONGR\FilterManagerBundle\Relation\RelationInterface;

/**
 * This class joins several relations using "and" logical operator.
 */
class AndRelation implements RelationInterface
{
    /**
     * @var RelationInterface[]
     */
    private array $relations;


    /**
     * @param RelationInterface[] $relations
     */
    public function __construct(array $relations = [])
    {
        $this->relations = $relations;
    }


    /**
     * {@inheritdoc}
     */
    public function isRelated($name): bool
    {
        foreach ($this->relations as $relation) {
            if (isset($relation) && $relation->isRelated($name) === false) {
                return false;
            }
        }

        return true;
    }


    public function addRelation(RelationInterface $relation = null): void
    {
        $this->relations[] = $relation;
    }
}
