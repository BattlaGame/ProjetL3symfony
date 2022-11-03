<?php

namespace App\Controller;

use App\Entity\Home;
use App\Form\HomeType;
use App\Repository\HomeRepository;
use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
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
    
    #[Route('/contact', name: 'app_contact_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ContactRepository $contactRepository): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactRepository->save($contact, true);

            return $this->redirectToRoute('app_home_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contact/new.html.twig', [
            'contact' => $contact,
            'form' => $form,
        ]);
    }

    #[Route('/admin', name: 'app_home_admin', methods: ['GET'])]
    public function admin(HomeRepository $homeRepository): Response
    {
        return $this->render('home/admin.html.twig', [
            'homes' => $homeRepository->findAll(),
        ]);
    }

}
