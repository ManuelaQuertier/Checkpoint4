<?php

namespace App\Controller;

use App\Entity\MultiplicationsTable;
use App\Repository\MultiplicationsTableRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

    /**
     * @Route("/game")
     * @isGranted("ROLE_USER")
     */
class GameController extends AbstractController
{
    /**
     * @Route("/", name="game")
     */
    public function index(MultiplicationsTableRepository $multiplicationsTableRepository): Response
    {
        return $this->render('game/index.html.twig', [
            'tables' => $multiplicationsTableRepository->findAll()
        ]);
    }

    /**
     * @Route("/{id}", name="game_show", methods={"GET"})
     */
    public function show(MultiplicationsTable $multiplicationsTable):Response
    {
        
        $operations= $multiplicationsTable->getOperations();
        $operation = $operations->get(array_rand($operations->toArray()));
        
        return $this->render('game/show.html.twig', [
            'operation' => $operation,
            'operations' => $operations
        ]);
    }
}
