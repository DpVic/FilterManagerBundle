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

namespace ONGR\FilterManagerBundle\Filter\Helper;

/**
 * This interface defines structure for Elasticsearch field aware filters.
 */
interface RequestFieldAwareInterface
{

    public function setRequestField(string $requestField): void;


    public function getRequestField(): string;
}
