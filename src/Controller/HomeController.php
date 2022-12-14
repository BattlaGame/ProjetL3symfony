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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

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

    #[Route('/newsletter', name: 'app_home_newsletter', methods: ['GET'])]
    public function newsletter(HomeRepository $homeRepository): Response
    {
        return $this->render('home/newsletter.html.twig', [
            'homes' => $homeRepository->findAll(),
        ]);
    }

    #[Route('/information', name: 'app_home_information', methods: ['GET'])]
    public function information(HomeRepository $homeRepository): Response
    {
        return $this->render('home/information.html.twig', [
            'homes' => $homeRepository->findAll(),
        ]);
    }
    
    #[Route('/payement', name: 'app_home_payement', methods: ['GET'])]
    public function payement(HomeRepository $homeRepository): Response
    {
        return $this->render('user/payement.html.twig', [
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
    #[IsGranted('ROLE_ADMIN')]
    public function admin(HomeRepository $homeRepository): Response
    {
        return $this->render('home/admin.html.twig', [
            'homes' => $homeRepository->findAll(),
        ]);
    }

}
