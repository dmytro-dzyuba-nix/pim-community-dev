<?php

declare(strict_types=1);

namespace Akeneo\Platform\Bundle\CatalogVolumeMonitoringBundle\tests\Integration\Persistence\Query;

use PHPUnit\Framework\Assert;
use Akeneo\Platform\Bundle\CatalogVolumeMonitoringBundle\tests\Integration\Persistence\QueryTestCase;

class AverageMaxLocalizableAttributesPerFamilyIntegration extends QueryTestCase
{
    public function testGetAverageAndMaximumNumberOfAttributesPerFamily()
    {
        $query = $this->get('pim_volume_monitoring.persistence.query.average_max_localizable_attributes_per_family');
        $this->createFamilyWithLocalizableAttributes(10, 30);
        $this->createFamilyWithLocalizableAttributes(0, 10);
        $this->createFamilyWithLocalizableAttributes(3, 10);

        $volume = $query->fetch();

        Assert::assertEquals(30, $volume->getMaxVolume());
        Assert::assertEquals(17, $volume->getAverageVolume());
        Assert::assertEquals('average_max_localizable_attributes_per_family', $volume->getVolumeName());
        Assert::assertEquals(false, $volume->hasWarning());
    }

    /**
     * @param int $numberOfLocAttributes
     * @param int $numberTotalAttribute
     */
    private function createFamilyWithLocalizableAttributes(int $numberOfLocAttributes, int $numberTotalAttribute): void
    {
        $family = $this->createFamily([
            'code' => 'family_' . rand()
        ]);

        $i = 0;
        while ($i < $numberOfLocAttributes-1) {
            $attribute = $this->createAttribute([
                'code'     => 'new_attribute_' . rand(),
                'type'     => 'pim_catalog_textarea',
                'group'    => 'other',
                'localizable' => true,
                'scopable' => false
            ]);

            $family->addAttribute($attribute);
            $i++;
        }

        //attribute sku is automatically added
        while ($i < $numberTotalAttribute - 1) {
            $attribute = $this->createAttribute([
                'code'     => 'new_attribute_' . rand(),
                'type'     => 'pim_catalog_textarea',
                'group'    => 'other',
                'localizable' => false,
                'scopable' => false
            ]);

            $family->addAttribute($attribute);
            $i++;
        }

        $errors = $this->get('validator')->validate($family);
        Assert::assertCount(0, $errors);

        $this->get('pim_catalog.saver.family')->save($family);
    }
}
