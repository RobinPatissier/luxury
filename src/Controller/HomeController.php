<?php

namespace App\Controller;

use App\Repository\JobOfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(JobOfferRepository $JobOfferRepository): Response
    {
            $JobOffers = $JobOfferRepository->findAll();

        return $this->render(
            'home/index.html.twig',
            [
                'JobOffers' => $JobOffers,
            ]
        );
    }

    #[Route('/compagny', name: 'app_compagny')]
    public function compagny(): Response
    {
        return $this->render(
            'home/compagny.html.twig',
            []
        );
    }

    #[Route('/loginn', name: 'app_loginn')]
    public function login(): Response
    {
        return $this->render(
            'home/login.html.twig',
            []
        );
    }

    #[Route('/registerr', name: 'app_registerr')]
    public function registerr(): Response
    {
        return $this->render(
            'home/registerr.html.twig',
            []
        );
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render(
            'home/contact.html.twig',
            []
        );
    }

    #[Route('/profilee', name: 'app_profilee')]
    public function profilee(): Response
    {
        return $this->render(
            'home/profilee.html.twig',
            []
        );
    }
    
}
