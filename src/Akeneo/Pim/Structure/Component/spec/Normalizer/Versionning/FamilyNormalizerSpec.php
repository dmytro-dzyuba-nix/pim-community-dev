<?php

namespace spec\Akeneo\Pim\Structure\Component\Normalizer\Versionning;

use PhpSpec\ObjectBehavior;
use Akeneo\Tool\Bundle\VersioningBundle\Normalizer\Flat\TranslationNormalizer;
use Akeneo\Pim\Structure\Component\Model\FamilyInterface;
use Akeneo\Pim\Structure\Component\Normalizer\Versionning\FamilyNormalizer;
use Prophecy\Argument;

class FamilyNormalizerSpec extends ObjectBehavior
{
    function let(
        FamilyNormalizer $familyNormalizerStandard,
        TranslationNormalizer $translationNormalizer
    ) {
        $this->beConstructedWith($familyNormalizerStandard, $translationNormalizer);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(FamilyNormalizer::class);
    }

    function it_is_a_normalizer()
    {
        $this->shouldImplement('Symfony\Component\Serializer\Normalizer\NormalizerInterface');
    }

    function it_supports_family_normalization_into_flat(FamilyInterface $family)
    {
        $this->supportsNormalization($family, 'flat')->shouldBe(true);
        $this->supportsNormalization($family, 'csv')->shouldBe(false);
        $this->supportsNormalization($family, 'json')->shouldBe(false);
        $this->supportsNormalization($family, 'xml')->shouldBe(false);
    }

    function it_normalizes_families(
        FamilyNormalizer $familyNormalizerStandard,
        TranslationNormalizer $translationNormalizer,
        FamilyInterface $family
    ) {
        $translationNormalizer->supportsNormalization(Argument::cetera())->willReturn(true);
        $translationNormalizer->normalize(Argument::cetera())->willReturn([]);

        $familyNormalizerStandard->supportsNormalization($family, 'standard')->willReturn(true);
        $familyNormalizerStandard->normalize($family, 'standard', [])->willReturn(
            [
                'code'                   => 'mugs',
                'attributes'             => ['name', 'price'],
                'attribute_as_label'     => 'name',
                'attribute_requirements' => [
                    'ecommerce' => ['name', 'price'],
                    'mobile'    => ['name'],
                ],
                'labels'                 => [],
            ]
        );

        $this->normalize($family, 'flat', [])->shouldReturn(
            [
                'code'                   => 'mugs',
                'attributes'             => 'name,price',
                'attribute_as_label'     => 'name',
                'requirements-ecommerce' => 'name,price',
                'requirements-mobile'    => 'name',
            ]
        );
    }
}
