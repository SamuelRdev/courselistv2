<?php

namespace App\Controller;

use App\Entity\ListeGlobale;
use App\Entity\User;
use App\Form\ListeGlobaleType;
use App\Repository\ListeContentRepository;
use App\Repository\ListeGlobaleRepository;
use App\Repository\ListeRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'admin_')]
class AdminController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ListeGlobaleRepository $listeGlobaleRepo, UserRepository $userRepo, ListeRepository $listeRepo, ListeContentRepository $listeContentRepo): Response
    {
        $user = $userRepo->findAll();
        $listeGlobale = $listeGlobaleRepo->findAll();
        $liste = $listeRepo->findAll();
        $listeContent = $listeContentRepo->findAll();

        return $this->render('admin/index.html.twig', [
            'user' => $user,
            'listeGlobale' => $listeGlobale,
            'liste' => $liste,
            'listeContent' => $listeContent
        ]);
    }

    #[Route('/listeGlobale/create', name: 'listeGlobale.create')]
    #[Route('/listeGlobale/{id}/update', name: 'listeGlobale.update')]
    public function formListeGlobale(Request $request, ListeGlobale $listeGlobale = null){
        
        if(!$listeGlobale){
            $listeGlobale = new ListeGlobale();
            $editMode = false;
        }else{
            $editMode = true;
        }

        $form = $this->createForm(ListeGlobaleType::class, $listeGlobale);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $listeGlobale = $form->getData();
            
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($listeGlobale);
            $manager->flush();

            $this->addFlash('message', 'La liste Globale à bien été ajoutée au répertoire.');
            
            return $this->redirectToRoute('admin_index');
        }

        return $this->render('admin/liste_globale.html.twig', [
            'form' => $form->createView(),
            'editMode' => $editMode
        ]);
    }

    
    #[Route('/listeGlobale/delete/{id}', name: 'listeGlobale.delete')]
    public function deleteContract(ListeGlobale $listeGlobale) 
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($listeGlobale);
        $manager->flush();

        $this->addFlash('message', 'Liste Globale supprimée avec succès.');

        return $this->redirectToRoute('admin_index');
    }

}
