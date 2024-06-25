<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\ProjectType;
use App\Entity\Projects;
use App\Repository\ProjectsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class HomeController extends AbstractController
{
    #[Route("/", name: "home")]
    function index (Request $request, ProjectsRepository $repository): Response {
        $projetcs = $repository -> findAll();
        return $this->render('home/index.html.twig', [
            'projects' => $projetcs,
        ]);
    }

    #[Route("/projet-add", name: "project.create")]
    function projectCreate (Request $request, EntityManagerInterface $em): Response {
        $project = new Projects();
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em->persist($project);
            $em->flush();
            $this->addFlash('success', 'projet creer');
            return $this->redirectToRoute('home');
        }
        return $this->render('home/project-add.html.twig', [
            'form' => $form
        ]);
    }

    #[Route("/project/{id}", name: 'project.show')]
    public function projectShow ( Request $request, int $id, ProjectsRepository $repository): Response
    {
        $project = $repository->find($id);
        return $this->render('home/projectShow.html.twig', [
            'project' => $project
        ]);
    }
}
