<?php

namespace App\Controller;

use App\Entity\Home;
use App\Form\HomeType;
use App\Repository\HomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/home')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home_index', methods: ['GET'])]
    public function index(HomeRepository $homeRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'homes' => $homeRepository->findAll(),
        ]);
    }

    #[Route('/Newsletter', name: 'app_home_newsletter', methods: ['GET'])]
    public function newsletter(HomeRepository $homeRepository): Response
    {
        return $this->render('home/newsletter.html.twig', [
            'homes' => $homeRepository->findAll(),
        ]);
    }

    #[Route('/Contact', name: 'app_home_contact', methods: ['GET'])]
    public function contact(HomeRepository $homeRepository): Response
    {
        return $this->render('home/contact.html.twig', [
            'homes' => $homeRepository->findAll(),
        ]);
    }
}
