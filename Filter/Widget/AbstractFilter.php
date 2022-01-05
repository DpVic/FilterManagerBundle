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

namespace ONGR\FilterManagerBundle\Filter\Widget;

use ONGR\FilterManagerBundle\Filter\FilterInterface;
use ONGR\FilterManagerBundle\Filter\FilterState;
use ONGR\FilterManagerBundle\Filter\Helper\DocumentFieldAwareTrait;
use ONGR\FilterManagerBundle\Filter\Helper\OptionsAwareTrait;
use ONGR\FilterManagerBundle\Filter\Helper\RequestFieldAwareTrait;
use ONGR\FilterManagerBundle\Filter\Relation\RelationAwareTrait;
use Symfony\Component\HttpFoundation\Request;

/**
 * This class generalises filters using single field value from request.
 */
abstract class AbstractFilter implements FilterInterface
{
    use RelationAwareTrait;
    use RequestFieldAwareTrait;
    use DocumentFieldAwareTrait;
    use OptionsAwareTrait;


    private array $tags = [];


    /**
     * {@inheritdoc}
     */
    public function getState(Request $request): FilterState
    {
        $state = new FilterState();
        $value = $request->get($this->getRequestField());

        if (isset($value) && $value !== '') {
            $value = is_array($value) ? array_values($value) : $value;
            $state->setActive(true);
            $state->setValue($value);
            $state->setUrlParameters([$this->getRequestField() => $value]);
        }

        return $state;
    }


    public function getTags(): array
    {
        return $this->tags;
    }


    public function setTags(array $tags): void
    {
        $this->tags = $tags;
    }


    /**
     * {@inheritdoc}
     */
    public function isRelated(): bool
    {
        return false;
    }
}
