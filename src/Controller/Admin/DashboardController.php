<?php

namespace App\Controller\Admin;

use App\Entity\MultiplicationsTable;
use App\Entity\Operation;
use App\Entity\Result;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     * @IsGranted("ROLE_ADMIN")
     */
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Tables');
    }

    public function configureMenuItems(): iterable
    {
        return[ 
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('Game'),
            MenuItem::linkToCrud('MultiplicationsTable', 'fa fa-table', MultiplicationsTable::class),
            MenuItem::linkToCrud('operation', 'fa fa-close', Operation::class),
            MenuItem::linkToCrud('result', 'fa fa-check', Result::class),
            MenuItem::linkToRoute('Le jeu des tables', 'fa fa-gamepad', 'game'),
            MenuItem::section('Utilisateurs'),
            MenuItem::linkToCrud('user', 'fa fa-user', User::class),
            MenuItem::linkToLogout('Déconnexion', 'fa fa-power-off')
        ];
    }
}
