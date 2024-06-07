<?php

namespace App\Controller;
use App\Entity\Personnage;
use App\Repository\PersonnageRepository;
use App\Form\PersonnageType;
use App\Repository\AventureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;


class JouerController extends AbstractController
{
    #[Route('/jouer', name: 'app_jouer')]
    public function index(PersonnageRepository $personnageRepository): Response
    {
        $personnages = $personnageRepository->findAll();
        return $this->render('jouer/index.html.twig', [
            'personnages' => $personnages,
        ]);
    }

    #[Route('/jouer/new', name: 'app_jouer_new')]
    public function newPersonnage(Request $request, EntityManagerInterface $entityManager)
    {
        $personnage = new Personnage();
        $form = $this->createForm(PersonnageType::class, $personnage);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($personnage);
            $entityManager->flush();
            return $this->redirectToRoute('app_jouer', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('jouer/new_personnage.html.twig', ['form'=>$form, 'personnage'=>$personnage]);
    }

    #[Route('jouer/aventures/{idPersonnage}', name: 'app_choix_aventure', methods:['GET'])]
    public function afficherAventures(PersonnageRepository $personnageRepository, AventureRepository $aventureRepository, $idPersonnage):Response
    {
        $personnage = $personnageRepository->find($idPersonnage);
        $aventures = $aventureRepository->findAll();
        return $this->render('jouer/aventures.html.twig', ['personnage' => $personnage , 'aventures' => $aventures]);
    }
}
