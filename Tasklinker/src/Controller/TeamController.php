<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TeamController extends AbstractController
{

    #[Route('/team', name: 'team.index')]
    public function index(Request $request): Response
    {
        return $this->render('team/index.html.twig');
    }

    #[Route('/team/{slug}-{id}', name: 'team.show')]
    public function show(Request $request, string $slug, int $id): Response
    {
        return $this->render('team/show.html.twig', [
            'slug' => $slug,
            'id' => $id
        ]);
    }
}
