# UPGRADE FROM 2.3 TO 3.0

## Migrate your custom code

Several classes and services have been moved or renamed. The following commands help to migrate references to them:

```bash

find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\Doctrine\\ORM\\Repository\\FamilyVariantRepository/Akeneo\\Pim\\Structure\\Bundle\\Doctrine\\ORM\\Repository\\FamilyVariantRepository/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\Doctrine\\ORM\\Repository\\FamilyRepository/Akeneo\\Pim\\Structure\\Bundle\\Doctrine\\ORM\\Repository\\FamilyRepository/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\Doctrine\\ORM\\Repository\\AttributeRepository/Akeneo\\Pim\\Structure\\Bundle\\Doctrine\\ORM\\Repository\\AttributeRepository/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Repository\\FamilyVariantRepositoryInterface/Akeneo\\Pim\\Structure\\Component\\Repository\\FamilyVariantRepositoryInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Repository\\FamilyRepositoryInterface/Akeneo\\Pim\\Structure\\Component\\Repository\\FamilyRepositoryInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Repository\\AttributeRepositoryInterface/Akeneo\\Pim\\Structure\\Component\\Repository\\AttributeRepositoryInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Repository\\AttributeGroupRepositoryInterface/Akeneo\\Pim\\Structure\\Component\\Repository\\AttributeGroupRepositoryInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\Doctrine\\ORM\\Repository\\AttributeGroupRepository/Akeneo\\Pim\\Structure\\Bundle\\Doctrine\\ORM\\Repository\\AttributeGroupRepository/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\Doctrine\\ORM\\Query\\FamilyVariantsByAttributeAxes/Akeneo\\Pim\\Structure\\Bundle\\Doctrine\\ORM\\Query\\FamilyVariantsByAttributeAxes/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\FamilyVariant\\Query\\FamilyVariantsByAttributeAxesInterface/Akeneo\\Pim\\Structure\\Component\\FamilyVariant\\Query\\FamilyVariantsByAttributeAxesInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\FamilyVariant\\AddUniqueAttributes/Akeneo\\Pim\\Structure\\Component\\FamilyVariant\\AddUniqueAttributes/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Factory\\FamilyFactory/Akeneo\\Pim\\Structure\\Component\\Factory\\FamilyFactory/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Factory\\AttributeRequirementFactory/Akeneo\\Pim\\Structure\\Component\\Factory\\AttributeRequirementFactory/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Factory\\AttributeFactory/Akeneo\\Pim\\Structure\\Component\\Factory\\AttributeFactory/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\Entity\\AttributeGroup/Akeneo\\Pim\\Structure\\Component\\Model\\AttributeGroup/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Model\\AttributeGroupInterface/Akeneo\\Pim\\Structure\\Component\\Model\\AttributeGroupInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\Entity\\AttributeGroupTranslation/Akeneo\\Pim\\Structure\\Component\\Model\\AttributeGroupTranslation/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Model\\AttributeGroupTranslationInterface/Akeneo\\Pim\\Structure\\Component\\Model\\AttributeGroupTranslationInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/pim_catalog.model.currency.interface/akeneo_channel.model.currency.interface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Validator\\Constraints\\ActivatedLocale/Akeneo\\Channel\\Component\\Validator\\Constraint\\ActivatedLocale`/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Validator\\Constraints\\Locale/Akeneo\\Channel\\Component\\Validator\\Constraint\\Locale/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\Doctrine\\ORM\\Repository\\LocaleRepository/Akeneo\\Channel\\Bundle\\Doctrine\\Repository\\LocaleRepository/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Repository\\LocaleRepositoryInterface/Akeneo\\Channel\\Component\\Repository\\LocaleRepositoryInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\Entity\\Locale/Akeneo\\Channel\\Component\\Model\\Locale/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Model\\LocaleInterface/Akeneo\\Channel\\Component\\Model\\LocaleInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/pim_catalog.model.locale.interface/akeneo_channel.model.locale.interface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Oro\\Bundle\\UserBundle\\Entity\\UserManager/Akeneo\\UserManagement\\Bundle\\Manager\\UserManager/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Oro\\Bundle\\UserBundle\\Form\\Type\\RoleApiType/Akeneo\\UserManagement\\Bundle\\Form\\Type\\RoleApiType/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Oro\\Bundle\\UserBundle\\Form\\Type\\AclRoleType/Akeneo\\UserManagement\\Bundle\\Form\\Type\\AclRoleType/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Oro\\Bundle\\UserBundle\\Form\\Handler\\UserHandler/Akeneo\\UserManagement\\Bundle\\Form\\Handler\\UserHandler/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Oro\\Bundle\\UserBundle\\Form\\Handler\\ResetHandler/Akeneo\\UserManagement\\Bundle\\Form\\Handler\\ResetHandler/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Oro\\Bundle\\UserBundle\\Form\\Handler\\AclRoleHandler/Akeneo\\UserManagement\\Bundle\\Form\\Handler\\AclRoleHandler/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Oro\\Bundle\\UserBundle\\Security\\UserProvider/Akeneo\\UserManagement\\Bundle\\Security\\UserProvider/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Oro\\Bundle\\UserBundle\\Form\\Type\\ResetType/Akeneo\\UserManagement\\Bundle\\Form\\Type\\ResetType/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Oro\\Bundle\\UserBundle\\Form\\Type\\GroupType/Akeneo\\UserManagement\\Bundle\\Form\\Type\\GroupType/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Oro\\Bundle\\UserBundle\\Form\\Type\\GroupApiType/Akeneo\\UserManagement\\Bundle\\Form\\Type\\GroupApiType/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Oro\\Bundle\\UserBundle\\Form\\Type\\ChangePasswordType/Akeneo\\UserManagement\\Bundle\\Form\\Type\\ChangePasswordType/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Oro\\Bundle\\UserBundle\\Form\\Handler\\GroupHandler/Akeneo\\UserManagement\\Bundle\\Form\\Handler\\GroupHandler/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Oro\\Bundle\\UserBundle\\Form\\Handler\\AbstractUserHandler/Akeneo\\UserManagement\\Bundle\\Form\\Handler\\AbstractUserHandler/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Oro\\Bundle\\UserBundle\\Entity\\EventListener\\UploadedImageSubscriber/Akeneo\\UserManagement\\Bundle\\EventSubscriber\\UploadedImageSubscriber/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Oro\\Bundle\\UserBundle\\Entity\\EntityUploadedImageInterface/Akeneo\\UserManagement\\Component\\EntityUploadedImageInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Oro\\Bundle\\UserBundle\\Entity\\Repository/Akeneo\\UserManagement\\Bundle\\Doctrine\\ORM\\Repository/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Oro\\Bundle\\UserBundle\\Form\\EventListener/Akeneo\\UserManagement\\Bundle\\Form\\Subscriber/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Oro\\Bundle\\UserBundle\\EventListener/Akeneo\\UserManagement\\Bundle\\EventListener/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Oro\\Bundle\\UserBundle\\Controller/Akeneo\\UserManagement\\Bundle\\Controller/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\UserBundle\\Controller\\UserRestController/Akeneo\\UserManagement\\Bundle\\Controller\\Rest\\UserController/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\UserBundle\\Controller\\SecurityRestController/Akeneo\\UserManagement\\Bundle\\Controller\\Rest\\SecurityController/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\UserBundle\\Controller\\UserGroupRestController/Akeneo\\UserManagement\\Bundle\\Controller\\Rest\\UserGroupController/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Oro\\Bundle\\UserBundle\\OroUserEvents/Akeneo\\UserManagement\\Component\\UserEvents/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Oro\\Bundle\\UserBundle\\Entity\\UserManager/Akeneo\\UserManagement\\Bundle\\Manager\\UserManager/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Oro\\Bundle\\UserBundle\\Entity\\Role/Akeneo\\UserManagement\\Component\\Model\\Role/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Oro\\Bundle\\UserBundle\\Entity\\Group/Akeneo\\UserManagement\\Component\\Model\\Group/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\UserBundle\\Entity\\User/Akeneo\\UserManagement\\Component\\Model\\User/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\UserBundle\\Entity\\UserInterface/Akeneo\\UserManagement\\Component\\Model\\UserInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\UserBundle/Akeneo\\UserManagement\\Bundle/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\User/Akeneo\\UserManagement\\Component/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Api/Akeneo\\Tool\\Component\\Api/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\ApiBundle/Akeneo\\Tool\\Bundle\\ApiBundle/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Component\\Batch/Akeneo\\Tool\\Component\\Batch/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Bundle\\BatchBundle/Akeneo\\Tool\\Bundle\\BatchBundle/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Component\\BatchQueue/Akeneo\\Tool\\Component\\BatchQueue/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Bundle\\BatchQueueBundle/Akeneo\\Tool\\Bundle\\BatchQueueBundle/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Component\\StorageUtils/Akeneo\\Tool\\Component\\StorageUtils/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Bundle\\StorageUtilsBundle/Akeneo\\Tool\\Bundle\\StorageUtilsBundle/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Bundle\\ElasticsearchBundle/Akeneo\\Tool\\Bundle\\StorageUtilsBundle/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Component\\Analytics/Akeneo\\Tool\\Component\\Analytics/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Component\\Buffer/Akeneo\\Tool\\Component\\Buffer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Component\\Console/Akeneo\\Tool\\Component\\Console/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Component\\Localization/Akeneo\\Tool\\Component\\Localization/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Component\\Versionning/Akeneo\\Tool\\Component\\Versionning/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Bundle\\MeasureBundle/Akeneo\\Tool\\Bundle\\MeasureBundle/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Component\\FileStorage/Akeneo\\Tool\\Component\\FileStorage/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Bundle\\FileStorageBundle/Akeneo\\Tool\\Bundle\\FileStorageBundle/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Component\\Classification/Akeneo\\Tool\\Component\\Classification/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Bundle\\ClassificationBundle/Akeneo\\Tool\\Bundle\\ClassificationBundle/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Bundle\\BufferBundle/Akeneo\\Tool\\Bundle\\BufferBundle/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Tool\\Bundle\\ApiBundle\\Controller\\ChannelController/Akeneo\\Channel\\Bundle\\Controller\\ExternalApi\\ChannelController/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\Doctrine\\Common\\Remover\\ChannelRemover/Akeneo\\Channel\\Bundle\\Doctrine\\Remover\\ChannelRemover/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\Doctrine\\ORM\\Repository\\ChannelRepository/Akeneo\\Channel\\Bundle\\Doctrine\\Repository\\ChannelRepository/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\EnrichBundle\\EventListener\\Storage\\ChannelLocaleSubscriber/Akeneo\\Channel\\Bundle\\EventListener\\ChannelLocaleSubscriber/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\Entity\\Channel/Akeneo\\Channel\\Component\\Model\\Channel/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Model\\ChannelInterface/Akeneo\\Channel\\Component\\Model\\ChannelInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\Entity\\ChannelTranslation/Akeneo\\Channel\\Component\\Model\\ChannelTranslation/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Model\\ChannelTranslationInterface/Akeneo\\Channel\\Component\\Model\\ChannelTranslationInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Tool\\Component\\Api\\Normalizer\\ChannelNormalizer/Akeneo\\Channel\\Component\\Normalizer\\ExternalApi\\ChannelNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\EnrichBundle\\Normalizer\\ChannelNormalizer/Akeneo\\Channel\\Component\\Normalizer\\InternalApi\\ChannelNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Normalizer\\Standard\\ChannelNormalizer/Akeneo\\Channel\\Component\\Normalizer\\Standard\\ChannelNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\VersioningBundle\\Normalizer\\Flat\\ChannelNormalizer/Akeneo\\Channel\\Component\\Normalizer\\Versioning\\ChannelNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Repository\\ChannelRepositoryInterface/Akeneo\\Channel\\Component\\Repository\\ChannelRepositoryInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Updater\\ChannelUpdater/Akeneo\\Channel\\Component\\Updater\\ChannelUpdater/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Updater\\LocaleUpdater/Akeneo\\Channel\\Component\\Updater\\LocaleUpdater/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\Tool\Component\Api\Normalizer\LocaleNormalizer/Akeneo\Channel\Component\Normalizer\ExternalApi\LocaleNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\Bundle\EnrichBundle\Normalizer\LocaleNormalizer/Akeneo\Channel\Component\Normalizer\InternalApi\LocaleNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\Bundle\VersioningBundle\Normalizer\Flat/Akeneo\Channel\Component\Normalizer\Versioning/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Model\\CurrencyInterface/Akeneo\\Channel\\Component\\Model\\CurrencyInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Model\\CurrencyInterface/Akeneo\\Channel\\Component\\Model\\CurrencyInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\Doctrine\\ORM\\Repository\\CurrencyRepository/Akeneo\\Channel\\Bundle\\Doctrine\\Repository\\CurrencyRepository/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\EventSubscriber\\CurrencyDisablingSubscriber/Akeneo\\Channel\\Bundle\\EventListener\\CurrencyDisablingSubscriber/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Tool\\Component\\Api\\Normalizer\\CurrencyNormalizer/Akeneo\\Tool\\Component\\Api\\Normalizer\\CurrencyNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Normalizer\\Standard\\CurrencyNormalizer/Akeneo\\Channel\\Component\\Normalizer\\Standard\\CurrencyNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Repository\\CurrencyRepositoryInterface/Akeneo\\Channel\\Component\\Repository\\CurrencyRepositoryInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Updater\\CurrencyUpdater/Akeneo\\Channel\\Component\\Updater\\CurrencyUpdater/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Connector\\ArrayConverter\\FlatToStandard\\Channel/Akeneo\\Channel\\Component\\ArrayConverter\\FlatToStandard\\Channel/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Connector\\ArrayConverter\\FlatToStandard\\Locale/Akeneo\\Channel\\Component\\ArrayConverter\\FlatToStandard\\Locale/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Connector\\ArrayConverter\\FlatToStandard\\Currency/Akeneo\\Channel\\Component\\ArrayConverter\\FlatToStandard\\Currency/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Connector\\ArrayConverter\\StandardToFlat\\Channel/Akeneo\\Channel\\Component\\ArrayConverter\\StandardToFlat\\Channel/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Connector\\ArrayConverter\\StandardToFlat\\Locale/Akeneo\\Channel\\Component\\ArrayConverter\\StandardToFlat\\Locale/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Connector\\ArrayConverter\\StandardToFlat\\Currency/Akeneo\\Channel\\Component\\ArrayConverter\\StandardToFlat\\Currency/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Exception\\LinkedChannelException/Akeneo\\Channel\\Component\\Exception\\LinkedChannelException/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Model\\ReferableInterface/Akeneo\\Tool\\Component\\StorageUtils\\Model\\ReferableInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\Entity\\Attribute/Akeneo\\Pim\\Structure\\Component\\Model\\Attribute/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Model\\AbstractAttribute/Akeneo\\Pim\\Structure\\Component\\Model\\AbstractAttribute/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Model\\AttributeInterface/Akeneo\\Pim\\Structure\\Component\\Model\\AttributeInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\Entity\\AttributeOption/Akeneo\\Pim\\Structure\\Component\\Model\\AttributeOption/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Model\\AttributeOptionInterface/Akeneo\\Pim\\Structure\\Component\\Model\\AttributeOptionInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Model\\FamilyInterface/Akeneo\\Pim\\Structure\\Component\\Model\\FamilyInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\Entity\\Family/Akeneo\\Pim\\Structure\\Component\\Model\\Family/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\Entity\\FamilyTranslation/Akeneo\\Pim\\Structure\\Component\\Model\\FamilyTranslation/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Model\\FamilyTranslationInterface/Akeneo\\Pim\\Structure\\Component\\Model\\FamilyTranslationInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Model\\FamilyVariantInterface/Akeneo\\Pim\\Structure\\Component\\Model\\FamilyVariantInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Model\\FamilyVariant/Akeneo\\Pim\\Structure\\Component\\Model\\FamilyVariant/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Model\\FamilyVariantTranslation/Akeneo\\Pim\\Structure\\Component\\Model\\FamilyVariant/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Model\\FamilyVariantTranslationInterface/Akeneo\\Pim\\Structure\\Component\\Model\\FamilyVariant/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\Entity\\AttributeRequirement/Akeneo\\\Pim\\Structure\\Component\\Model\\AttributeRequirement/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Model\\AttributeRequirementInterface/Akeneo\\Pim\\Structure\\Component\\Model\\AttributeRequirementInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\Entity\\AttributeTranslation/Akeneo\\Pim\\Structure\\Component\\Model\\AttributeTranslation/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Model\\AttributeTranslationInterface/Akeneo\\Pim\\Structure\\Component\\Model\\AttributeTranslationInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Model\\VariantAttributeSet/Akeneo\\Pim\\Structure\\Component\\Model\\VariantAttributeSet/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Model\\VariantAttributeSetInterface/Akeneo\\Pim\\Structure\\Component\\Model\\VariantAttributeSetInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Updater\\AttributeUpdater/Akeneo\\Pim\\Structure\\Component\\Updater\\AttributeUpdater/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Updater\\AttributeOptionUpdater/Akeneo\\Pim\\Structure\\Component\\Updater\\AttributeOptionUpdater/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Updater\\FamilyUpdater/Akeneo\\Pim\\Structure\\Component\\Updater\\FamilyUpdater/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Tool\\Component\\Api\\Updater\\FamilyVariantUpdater/Akeneo\\Pim\\Structure\\Component\\Updater\\ExternalApi\\FamilyVariantUpdater/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Updater\\FamilyVariantUpdater/Akeneo\\Pim\\Structure\\Component\\Updater\\FamilyVariantUpdater/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Tool\\Component\\Api\\Normalizer\\AttributeGroupNormalizer/Akeneo\\Pim\\Structure\\Component\\Normalizer\\ExternalApi\\AttributeGroupNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Tool\\Component\\Api\\Normalizer\\AttributeNormalizer/Akeneo\\Pim\\Structure\\Component\\Normalizer\\ExternalApi\\AttributeNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Tool\\Component\\Api\\Normalizer\\AttributeOptionNormalizer/Akeneo\\Pim\\Structure\\Component\\Normalizer\\ExternalApi\\AttributeOptionNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Tool\\Component\\Api\\Normalizer\\FamilyNormalizer/Akeneo\\Pim\\Structure\\Component\\Normalizer\\ExternalApi\\FamilyNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Akeneo\\Tool\\Component\\Api\\Normalizer\\FamilyVariantNormalizer/Akeneo\\Pim\\Structure\\Component\\Normalizer\\ExternalApi\\FamilyVariantNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Normalizer\\Indexing\\FamilyNormalizer/Akeneo\\Pim\\Structure\\Component\\Normalizer\\Indexing\\FamilyNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\EnrichBundle\\Normalizer\\AttributeGroupNormalizer/Akeneo\\Pim\\Structure\\Component\\Normalizer\\InternalApi\\AttributeGroupNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\EnrichBundle\\Normalizer\\AttributeNormalizer/Akeneo\\Pim\\Structure\\Component\\Normalizer\\InternalApi\\AttributeNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\EnrichBundle\\Normalizer\\AttributeOptionNormalizer/Akeneo\\Pim\\Structure\\Component\\Normalizer\\InternalApi\\AttributeOptionNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\EnrichBundle\\Normalizer\\FamilyNormalizer/Akeneo\\Pim\\Structure\\Component\\Normalizer\\InternalApi\\FamilyNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\EnrichBundle\\Normalizer\\FamilyVariantNormalizer/Akeneo\\Pim\\Structure\\Component\\Normalizer\\InternalApi\\FamilyVariantNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Normalizer\\Standard\\AttributeGroupNormalizer/Akeneo\\Pim\\Structure\\Component\\Normalizer\\Standard\\AttributeGroupNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Normalizer\\Standard\\AttributeNormalizer/Akeneo\\Pim\\Structure\\Component\\Normalizer\\Standard\\AttributeNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Normalizer\\Standard\\AttributeOptionNormalizer/Akeneo\\Pim\\Structure\\Component\\Normalizer\\Standard\\AttributeOptionNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Normalizer\\Standard\\FamilyNormalizer/Akeneo\\Pim\\Structure\\Component\\Normalizer\\Standard\\FamilyNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Normalizer\\Standard\\FamilyVariantNormalizer/Akeneo\\Pim\\Structure\\Component\\Normalizer\\Standard\\FamilyVariantNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Normalizer\\Storage\\AttributeOptionNormalizer/Akeneo\\Pim\\Structure\\Component\\Normalizer\\Storage\\AttributeOptionNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\VersioningBundle\\Normalizer\\Flat\\AttributeGroupNormalize/Akeneo\\Pim\\Structure\\Component\\Normalizer\\Versionning\\AttributeGroupNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\VersioningBundle\\Normalizer\\Flat\\AttributeNormalizer/Akeneo\\Pim\\Structure\\Component\\Normalizer\\Versionning\\AttributeNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\VersioningBundle\\Normalizer\\Flat\\AttributeOptionNormalizer/Akeneo\\Pim\\Structure\\Component\\Normalizer\\Versionning\\AttributeOptionNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\VersioningBundle\\Normalizer\\Flat\\FamilyNormalizer/Akeneo\\Pim\\Structure\\Component\\Normalizer\\Versionning\\FamilyNormalizer/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\ApiBundle\\Controller\\AttributeController/Akeneo\\Pim\\Structure\\Bundle\\Controller\\ExternalApi\\AttributeController/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\ApiBundle\\Controller\\AttributeGroupController/Akeneo\\Pim\\Structure\\Bundle\\Controller\\ExternalApi\\AttributeGroupController/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\ApiBundle\\Controller\\AttributeOptionController/Akeneo\\Pim\\Structure\\Bundle\\Controller\\ExternalApi\\AttributeOptionController/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\ApiBundle\\Controller\\FamilyController/Akeneo\\Pim\\Structure\\Bundle\\Controller\\ExternalApi\\FamilyController/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\ApiBundle\\Controller\\FamilyVariantController/Akeneo\\Pim\\Structure\\Bundle\\Controller\\ExternalApi\\FamilyVariantController/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\EnrichBundle\\Controller\\Rest\\AttributeController/Akeneo\\Pim\\Structure\\Bundle\\Controller\\InternalApi\\AttributeController/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\EnrichBundle\\Controller\\Rest\\AttributeGroupController/Akeneo\\Pim\\Structure\\Bundle\\Controller\\InternalApi\\AttributeGroupController/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\EnrichBundle\\Controller\\Rest\\AttributeOptionController/Akeneo\\Pim\\Structure\\Bundle\\Controller\\InternalApi\\AttributeOptionController/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\EnrichBundle\\Controller\\Rest\\FamilyController/Akeneo\\Pim\\Structure\\Bundle\\Controller\\InternalApi\\FamilyController/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\EnrichBundle\\Controller\\Rest\\FamilyVariantController/Akeneo\\Pim\\Structure\\Bundle\\Controller\\InternalApi\\FamilyVariantController/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\EnrichBundle\\Controller\\Rest\\AttributeTypeController/Akeneo\\Pim\\Structure\\Bundle\\Controller\\InternalApi\\AttributeTypeController/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\AttributeTypeRegistry/Akeneo\\Pim\\Structure\\Component\\AttributeTypeRegistry/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\Doctrine\\ORM\\Repository\\AttributeOptionRepository/Akeneo\\Pim\\Structure\\Bundle\\Doctrine\\ORM\\Repository\\AttributeOptionRepository/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\Doctrine\\Common\\Saver\\AttributeSaver/Akeneo\\Pim\\Structure\\Bundle\\Doctrine\\ORM\\Saver\\AttributeSaver/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\Doctrine\\Common\\Saver\\FamilySaver/Akeneo\\Pim\\Structure\\Bundle\\Doctrine\\ORM\\Saver\\FamilySaver/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Repository\\AttributeRequirementRepositoryInterface/Akeneo\\Pim\\Structure\\Component\\Repository\\AttributeRequirementRepositoryInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Catalog\\Repository\\AttributeOptionRepositoryInterface/Akeneo\\Pim\\Structure\\Component\\Repository\\AttributeOptionRepositoryInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Component\\Api\\Repository\\AttributeRepositoryInterface/Akeneo\\Pim\\Structure\\Component\\Repository\\ExternalApi\\AttributeRepositoryInterface/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\EnrichBundle\\Doctrine\\ORM\\Repository\\AttributeGroupRepository/Akeneo\\Pim\\Structure\\Bundle\\Doctrine\\ORM\\Repository\\InternalApi\\AttributeGroupRepository/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\EnrichBundle\\Doctrine\\ORM\\Repository\\AttributeOptionSearchableRepository/Akeneo\\Pim\\Structure\\Bundle\\Doctrine\\ORM\\Repository\\InternalApi\\AttributeOptionSearchableRepository/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\EnrichBundle\\Doctrine\\ORM\\Repository\\AttributeRepository/Akeneo\\Pim\\Structure\\Bundle\\Doctrine\\ORM\\Repository\\InternalApi\\AttributeRepository/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\EnrichBundle\\Doctrine\\ORM\\Repository\\AttributeSearchableRepository/Akeneo\\Pim\\Structure\\Bundle\\Doctrine\\ORM\\Repository\\InternalApi\\AttributeSearchableRepository/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\EnrichBundle\\Doctrine\\ORM\\Repository\\FamilyRepository/Akeneo\\Pim\\Structure\\Bundle\\Doctrine\\ORM\\Repository\\InternalApi\\FamilyRepository/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\EnrichBundle\\Doctrine\\ORM\\Repository\\FamilySearchableRepository/Akeneo\\Pim\\Structure\\Bundle\\Doctrine\\ORM\\Repository\\InternalApi\\FamilySearchableRepository/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\EnrichBundle\\Doctrine\\ORM\\Repository\\FamilyVariantRepository/Akeneo\\Pim\\Structure\\Bundle\\Doctrine\\ORM\\Repository\\InternalApi\\FamilyVariantRepository/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\EnrichBundle\\Doctrine\\ORM\\Repository\\FamilyVariantSearchableRepository/Akeneo\\Pim\\Structure\\Bundle\\Doctrine\\ORM\\Repository\\InternalApi\\FamilyVariantSearchableRepository/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\EnrichBundle\\Doctrine\\ORM\\Repository\\AttributeGroupSearchableRepository/Akeneo\\Pim\\Structure\\Bundle\\Doctrine\\ORM\\Repository\\InternalApi\\AttributeGroupSearchableRepository/g'
find ./src/ -type f -print0 | xargs -0 sed -i 's/Pim\\Bundle\\CatalogBundle\\AttributeType/Akeneo\\Pim\\Structure\\Component\\AttributeType/g'