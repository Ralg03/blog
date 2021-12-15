<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    private $contactRepository;
    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * @Route("/", name="contact")
     */

    public function index(Request $request): Response 
    {
        $name = $request->query->get('name');

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        dump($form->getViewData());

        if($form->isSubmitted() &&  $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($form->getData());
            $entityManager->flush();

           echo("ok");
        }
        return $this->renderForm('contact/index.html.twig',[
            'controller_name' => 'Contrôleur de Contact',
            'contact' => $this->contactRepository->findAll(),
            'form'=>$form,
        ]);
    }
          /**
     * @Route("/{id}", name="authentifId")
     */ 

    public function authentif(Request $request, string $id): Response 
    {
        $name = $request->query->get('name');

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        dump($form->getViewData());

        if($form->isSubmitted() &&  $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($form->getData());
            $entityManager->flush();

           echo("ok");
        }
        return $this->renderForm('contact/index.html.twig',[
            'controller_name' => 'Contrôleur de Contact',
            'contact' => $this->contactRepository->findAll(),
            'authentif'=> $this->contactRepository->find($id),
            'form'=>$form,
        ]);
    }
}