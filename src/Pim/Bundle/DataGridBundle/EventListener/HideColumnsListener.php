<?php

namespace Pim\Bundle\DataGridBundle\EventListener;

use Symfony\Component\Security\Core\SecurityContextInterface;
use Doctrine\ORM\EntityRepository;
use Oro\Bundle\DataGridBundle\Event\BuildAfter;

/**
 * Hide columns the user configured
 *
 * @author    Gildas Quemener <gildas@akeneo.com>
 * @copyright 2014 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class HideColumnsListener
{
    /** @var SecurityContextInterface */
    protected $securityContext;

    /** @var EntityRepository */
    protected $repository;

    public function __construct(SecurityContextInterface $securityContext, EntityRepository $repository)
    {
        $this->securityContext = $securityContext;
        $this->repository      = $repository;
    }

    public function onBuildAfter(BuildAfter $event)
    {
        $config = $event->getDatagrid()->getAcceptor()->getConfig();

        $datagridConfig = $this->getDatagridConfig($config->offsetGetByPath('[name]'));

        $availableColumns = [];
        $columns = [];
        $sorters = [];
        foreach ($config->offsetGetByPath('[columns]') as $key => $metadata) {
            $availableColumns[$key] = $metadata['label'];
            if ($datagridConfig && in_array($key, $datagridConfig->getColumns())) {
                $columns[$key] = $metadata;
                $sorters[$key] = $config->offsetGetByPath(sprintf('[sorters][columns][%s]', $key));
            }
        }
        $config->offsetSetByPath('[availableColumns]', $availableColumns);
        if ($datagridConfig) {
            $config->offsetSetByPath('[columns]', $columns);
            $config->offsetSetByPath('[sorters][columns]', $sorters);
        }
    }

    /**
     * Get datagrid configuration
     *
     * @param string $alias
     *
     * @return null|DatagridConfiguration
     */
    protected function getDatagridConfig($alias)
    {
        return $this
            ->repository
            ->findOneBy(
                [
                    'datagridAlias' => $alias,
                    'user'  => $this->getUser(),
                ]
            );
    }

    /**
     * Get the user from the security context
     *
     * @return mixed
     */
    protected function getUser()
    {
        if (null === $token = $this->securityContext->getToken()) {
            return;
        }

        if (!is_object($user = $token->getUser())) {
            return;
        }

        return $user;
    }
}
