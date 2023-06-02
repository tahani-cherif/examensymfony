<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\StadeRepository;
use App\Repository\MatchsRepository;
use App\Form\MatchsType;
use App\Entity\Matchs;
use Symfony\Component\HttpFoundation\Request;

class GestionmatchController extends AbstractController
{
    #[Route('/list', name: 'app_list')]
    public function list(StadeRepository $StadeRepository): Response
    {    $stade=$StadeRepository->findAll();
        return $this->render('gestionmatch/index.html.twig', [ 'stade'=>$stade ]);
    }
    #[Route('/delete/{id}', name: 'app_delete')]
    public function delete(StadeRepository $StadeRepository,$id): Response
    {   $stadefind=$StadeRepository->find($id);
        $StadeRepository->remove($stadefind,true);
        return $this->redirectToRoute('app_list'); 
    }
    #[Route('/listmatch', name: 'app_list_match')]
    public function listmatch(MatchsRepository $MatchsRepository): Response
    {    $match=$MatchsRepository->findAll();
        $order = $MatchsRepository->getOrderbynbspectateur();
        // var_dump($match) . die();
        return $this->render('gestionmatch/listmatch.html.twig', [ 'match'=>$order ]);
    }
    #[Route('/add', name: 'app_add')]
    public function add(MatchsRepository $MatchsRepository,Request $request): Response
    {    $match=new Matchs();
        $form=$this->createForm(MatchsType::class,$match);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $MatchsRepository->save($match,true);
            return $this->redirectToRoute('app_list_match'); 
        }
        return $this->renderForm('gestionmatch/ajoutermatch.html.twig', ['formadd'=>$form ]); //render suelement form
        //2eme methode , ['formadd'=>$form->createView() ]
    }
}
