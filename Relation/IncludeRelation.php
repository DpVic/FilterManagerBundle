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

/**
 * This class represents "include" relation.
 */
class IncludeRelation implements RelationInterface
{
    /**
     * @var string[]
     */
    private array $names;


    /**
     * @param array $names
     */
    public function __construct(array $names = [])
    {
        $this->names = array_flip($names);
    }


    /**
     * {@inheritdoc}
     */
    public function isRelated(string $name): bool
    {
        return isset($this->names[$name]);
    }
}
