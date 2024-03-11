<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homePage(): Response
    {
        $tracks = [
            ['song' => 'pardais', 'artist' => 'samara'],
            ['song' => 'classe s', 'artist' => 'samara'],
            ['song' => 'code', 'artist' => 'samara'],
            ['song' => 'ya lili', 'artist' => 'balti'],
            ['song' => 'ya ana ya ana', 'artist' => 'fayrouz'],
            ['song' => 'Fantasy', 'artist' => 'Mariah Carey'],
        ];
        $title = 'PB & Jams';
        return $this->render('vinyl/homepage.html.twig', [
            'title' => $title,
            'tracks' => $tracks,
        ]);
    }

    #[Route('/browse/{slug}', name: 'app_browsepage')]
    public function browse(string $slug = null): Response
    {
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : 'All Genres';
        return $this->render(
            'vinyl/browse.html.twig',
            [
                'genre' => $genre
            ]
        );
    }
}
