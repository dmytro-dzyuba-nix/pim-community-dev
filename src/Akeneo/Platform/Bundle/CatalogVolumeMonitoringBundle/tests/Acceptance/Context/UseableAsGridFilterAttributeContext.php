<?php

declare(strict_types=1);

namespace Akeneo\Platform\Bundle\CatalogVolumeMonitoringBundle\tests\Acceptance\Context;

use Akeneo\Platform\Bundle\CatalogVolumeMonitoringBundle\tests\Acceptance\Persistence\Query\InMemory\InMemoryCountQuery;
use Behat\Behat\Context\Context;

final class UseableAsGridFilterAttributeContext implements Context
{
    /** @var ReportContext */
    private $reportContext;

    /** @var InMemoryCountQuery */
    private $inMemoryQuery;

    /**
     * @param ReportContext      $reportContext
     * @param InMemoryCountQuery $inMemoryQuery
     */
    public function __construct(ReportContext $reportContext, InMemoryCountQuery $inMemoryQuery)
    {
        $this->reportContext = $reportContext;
        $this->inMemoryQuery = $inMemoryQuery;
    }

    /**
     * @Given a catalog with :numberOfAttributes useable as grid filter attributes
     *
     * @param int $numberOfAttributes
     */
    public function aCatalogWithAttributes(int $numberOfAttributes): void
    {
        $this->inMemoryQuery->setVolume($numberOfAttributes);
    }
}
