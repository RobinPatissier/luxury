<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Form\CandidatType;
use App\Repository\CandidatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/candidat')]
class CandidatController extends AbstractController
{

    #[Route('/edit', name: 'app_candidat_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $user = $this->getUser();
        $candidat = $user->getCandidat();

        $form = $this->createForm(CandidatType::class, $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // POUR LE PASSEPORT 
            $Passeport = $form->get('passportFile')->getData();

            if ($Passeport) {
                $originalFilename = pathinfo($Passeport->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $Passeport->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $Passeport->move(
                        $this->getParameter('passport_directory'),
                        $newFilename

                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                $candidat->setPassportFile($newFilename);
            }

            // POUR LE PROFIL
            $Profil = $form->get('profilPicture')->getData();

            if ($Profil) {
                $originalFilename = pathinfo($Profil->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $Profil->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $Profil->move(
                        $this->getParameter('profil_directory'),
                        $newFilename

                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                $candidat->setProfilPicture($newFilename);
            }

            // POUR LE CV
            $CV = $form->get('CV')->getData();

            if ($CV) {
                $originalFilename = pathinfo($CV->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $CV->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $CV->move(
                        $this->getParameter('CV_directory'),
                        $newFilename

                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                $candidat->setCV($newFilename);
            }


            $entityManager->persist($candidat);
            $entityManager->flush();
        }

        return $this->render('candidat/edit.html.twig', [
            'candidat' => $candidat,
            'form' => $form,
        ]);
    }

    #[Route('/delete', name: 'app_candidat_delete', methods: ['POST'])]
    public function delete(Request $request, Candidat $candidat, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $candidat->getId(), $request->request->get('_token'))) {
            $entityManager->remove($candidat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_candidat_index', [], Response::HTTP_SEE_OTHER);
    }
}
