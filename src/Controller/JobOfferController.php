<?php

namespace App\Controller;

use App\Entity\JobOffer;
use App\Form\JobOfferType;
use App\Repository\JobOfferRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/job/offer')]
class JobOfferController extends AbstractController
{
    #[Route('/JobOffer', name: 'app_JobOffer', methods: ['GET'])]
    public function jobOffers(JobOfferRepository $JobOfferRepository): Response
    {
        $JobOffers = $JobOfferRepository->findAll();

        return $this->render('job_offer/JobOffer.html.twig', [
            'JobOffers' => $JobOffers,
        ]);
    }

    #[Route('/{id}', name: 'app_job_offer_show', methods: ['GET'])]
    public function show(JobOffer $jobOffer): Response
    {
        return $this->render('job_offer/show.html.twig', [
            'job_offer' => $jobOffer,
        ]);
    }

    
}
