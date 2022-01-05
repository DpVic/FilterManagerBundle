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

namespace ONGR\FilterManagerBundle\Filter\Widget\Choice;

use ONGR\ElasticsearchDSL\Query\TermLevel\TermsQuery;
use ONGR\ElasticsearchDSL\Search;
use ONGR\FilterManagerBundle\Filter\FilterState;
use ONGR\FilterManagerBundle\Filter\ViewData;
use ONGR\FilterManagerBundle\Search\SearchRequest;
use Symfony\Component\HttpFoundation\Request;

/**
 * This class provides multiple terms choice filter.
 */
class MultiTermChoice extends SingleTermChoice
{
    /**
     * {@inheritdoc}
     */
    public function modifySearch(Search $search, FilterState $state = null, SearchRequest $request = null): void
    {
        if ($state && $state->isActive()) {
            $filter = new TermsQuery($this->getDocumentField(), $state->getValue());
            $search->addPostFilter($filter);
        }
    }


    public function getState(Request $request): FilterState
    {
        $value = $request->get($this->getRequestField());

        if (isset($value) && $value !== '' && !is_array($value)) {
            $request->query->set($this->getRequestField(), [ $value ]);
        }

        return parent::getState($request);
    }

    /**
     * Returns url with selected term applied.
     *
     * @param string   $key
     * @param ViewData $data
     *
     * @return array
     */
    protected function getOptionUrlParameters(string $key, ViewData $data): array
    {
        $parameters = $data->getUrlParameters();

        if (isset($parameters[$this->getRequestField()])) {
            $parameters[$this->getRequestField()][] = $key;
        } else {
            $parameters[$this->getRequestField()] = [$key];
        }

        return $parameters;
    }

    /**
     * {@inheritdoc}
     */
    protected function getUnsetUrlParameters(string $key, ViewData $data): array
    {
        $parameters = $data->getUrlParameters();

        if (isset($parameters[$this->getRequestField()]) && count($parameters[$this->getRequestField()]) > 1) {
            $parameters[$this->getRequestField()] = array_values(
                array_diff($parameters[$this->getRequestField()], [$key])
            );
        } else {
            $parameters = $data->getResetUrlParameters();
        }

        return $parameters;
    }

    /**
     * {@inheritdoc}
     */
    protected function isChoiceActive(string $key, ViewData $data): bool
    {
        return $data->getState()->isActive() && in_array($key, $data->getState()->getValue());
    }
}
