<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProstagesController extends AbstractController
{
     /**
     * @Route("/", name="prostage-accueil")
     */
    public function index()
    {
        return $this->render('prostages/index.html.twig');
    }

    /**
     * @Route("/entreprises", name="prostage-entreprises")
     */
    public function afficherEntreprises()
    {
        return $this->render('prostages/affichageEntreprises.html.twig');
    }

    /**
     * @Route("/formations", name="prostage-formations")
     */
    public function afficherFormations()
    {
        return $this->render('prostages/affichageFormations.html.twig');
    }

    /**
     * @Route("/stages/{id}", name="prostage-stage")
     */
    public function afficherStages($id)
    {
        return $this->render('prostages/affichageStages.html.twig', ['idStage' => $id]);
    }
}
