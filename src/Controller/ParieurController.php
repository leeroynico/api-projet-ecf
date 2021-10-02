<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParieurController extends AbstractController
{
    /**
     * @Route("/parieur", name="parieur")
     */
    public function index(): Response
    {
        return $this->render('parieur/index.html.twig', [
            'controller_name' => 'ParieurController',
        ]);
    }
}
