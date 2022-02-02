<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index(): Response
    {
        $table=[1,2,3,4,5,6,7,8,9];
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'table' => $table
        ]);
    }
}
