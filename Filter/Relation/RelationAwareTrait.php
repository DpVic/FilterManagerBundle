<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ONGR\FilterManagerBundle\Filter\Relation;

use ONGR\FilterManagerBundle\Relation\RelationInterface;

/**
 * This trait provides properties for standard filter relations.
 */
trait RelationAwareTrait
{

    private ?RelationInterface $searchRelation = null;


    private ?RelationInterface $resetRelation = null;


    public function getResetRelation(): ?RelationInterface
    {
        return $this->resetRelation;
    }


    public function setResetRelation(RelationInterface $resetRelation = null): void
    {
        $this->resetRelation = $resetRelation;
    }


    public function getSearchRelation(): ?RelationInterface
    {
        return $this->searchRelation;
    }


    public function setSearchRelation(RelationInterface $searchRelation): void
    {
        $this->searchRelation = $searchRelation;
    }
}
