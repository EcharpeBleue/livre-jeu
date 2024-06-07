<?php

namespace App\Controller;
use App\Entity\Personnage;
use App\Repository\PersonnageRepository;
use App\Form\PersonnageType;
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
    public function newPersonnage(Request $request, PersonnageRepository $personnageRepository)
    {
        $personnage = new Personnage();
        $form = $this->createForm(PersonnageType::class, $personnage);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $personnageRepository->save($personnage, true);
            return $this->redirectToRoute('app_jouer', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('jouer/new_personnage.html.twig', ['form'=>$form, 'personnage'=>$personnage]);
    }
}
