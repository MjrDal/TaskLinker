<?php

namespace App\Controller;

use App\Form\PersonType;
use App\Repository\TeamRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TeamController extends AbstractController
{

    #[Route('/team', name: 'team.index')]
    public function index(Request $request, TeamRepository $repository): Response
    {
        $team = $repository -> findAll();
        return $this->render('team/index.html.twig', [
            'team' => $team,
        ]);
    }

    #[Route('/team/{id}/edit', name: 'team.show')]
    public function edit(Request $request, int $id, TeamRepository $repository, EntityManagerInterface $em): Response
    {
        $person = $repository->find($id);
        $form = $this->createForm(PersonType::class, $person);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em->flush();
            $this->addFlash('success', 'données modifier');
            return $this->redirectToRoute('team.index');
        }
        return $this->render('team/show.html.twig', [
            'person' => $person,
            'form' => $form
        ]);
    }
}
