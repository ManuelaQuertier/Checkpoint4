<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     * @IsGranted("ROLE_USER")
     */
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }
}
