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
 * This trait defines methods for Elasticsearch field value aware filters.
 */
trait DocumentFieldAwareTrait
{

    private string $documentField;


    public function getDocumentField(): string
    {
        return $this->documentField;
    }


    public function setDocumentField(string $documentField): void
    {
        $this->documentField = $documentField;
    }
}
