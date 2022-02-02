<?php

namespace App\Controller\Admin;

use App\Entity\MultiplicationsTable;
use App\Entity\Operation;
use App\Entity\Result;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Checkpoint4');
    }

    public function configureMenuItems(): iterable
    {
        return[ 
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('Game'),
            MenuItem::linkToCrud('MultiplicationsTable', 'fa fa-home', MultiplicationsTable::class),
            MenuItem::linkToCrud('operation', 'fa fa-home', Operation::class),
            MenuItem::linkToCrud('result', 'fa fa-home', Result::class),
            MenuItem::section('Users'),
            MenuItem::linkToCrud('user', 'fa fa-user', User::class),
            MenuItem::linkToRoute('Le jeu des tables', 'fa fa-gamepad', 'default')
            
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        ];
    }
}
