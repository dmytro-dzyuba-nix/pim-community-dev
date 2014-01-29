<?php

namespace Pim\Bundle\CatalogBundle\Controller;

use Pim\Bundle\CatalogBundle\Manager\AttributeManager;
use Pim\Bundle\CatalogBundle\AbstractController\AbstractDoctrineController;
use Symfony\Component\HttpFoundation\Request;
use Pim\Bundle\CatalogBundle\Entity\DatagridConfiguration;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Validator\ValidatorInterface;
use Symfony\Component\Translation\TranslatorInterface;
use Oro\Bundle\DataGridBundle\Datagrid\Manager as DatagridManager;
use Pim\Bundle\CatalogBundle\AbstractController\AbstractController;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Oro\Bundle\UserBundle\Entity\User;

/**
 * Datagrid configuration controller
 *
 * @author    Gildas Quemener <gildas@akeneo.com>
 * @copyright 2014 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class DatagridController extends AbstractDoctrineController
{
    /** @var DatagridManager */
    protected $manager;

    /**
     * Constructor
     *
     * @param Request                  $request
     * @param EngineInterface          $templating
     * @param RouterInterface          $router
     * @param SecurityContextInterface $securityContext
     * @param FormFactoryInterface     $formFactory
     * @param ValidatorInterface       $validator
     * @param TranslatorInterface      $translator
     * @param DatagridManager          $manager
     */
    public function __construct(
        Request $request,
        EngineInterface $templating,
        RouterInterface $router,
        SecurityContextInterface $securityContext,
        FormFactoryInterface $formFactory,
        ValidatorInterface $validator,
        TranslatorInterface $translator,
        RegistryInterface $doctrine,
        DatagridManager $manager
    ) {
        parent::__construct($request, $templating, $router, $securityContext, $formFactory, $validator, $translator, $doctrine);

        $this->manager = $manager;
    }

    /**
     * {@inheritdoc}
     */
    public function editAction(Request $request, $alias)
    {
        $user    = $this->getUser();
        $columns = $this->getColumnChoices($alias);

        if (null === $configuration = $this->getDatagridConfiguration($alias, $user)) {
            $configuration = new DatagridConfiguration();
            $configuration->setUser($user);
            $configuration->setDatagridAlias($alias);
            $configuration->setColumns(array_keys($columns));
        }

        $form = $this->createForm('pim_catalog_datagrid_configuration', $configuration, [
            'columns' => $columns,
            'action'  => $this->generateUrl('pim_catalog_datagrid_edit', ['alias' => $alias]),
        ]);

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if ($form->isValid()) {
                $em = $this->getEntityManager();
                $em->persist($configuration);
                $em->flush();

                return $this->redirectToRoute('pim_catalog_product_index');
            }
        }

        return $this->render('PimCatalogBundle:Datagrid:edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    protected function getColumnChoices($alias)
    {
        return $this
            ->manager
            ->getDatagrid($alias)
            ->getAcceptor()
            ->getConfig()
            ->offsetGetByPath('[availableColumns]');
    }

    protected function getEntityManager()
    {
        return $this->doctrine->getEntityManager();
    }

    protected function getDatagridConfiguration($alias, User $user)
    {
        return $this
            ->getRepository('PimCatalogBundle:DatagridConfiguration')
            ->findOneBy(
                [
                    'datagridAlias' => $alias,
                    'user'          => $user,
                ]
            );
    }
}
