<?php

namespace App\Controller;

use App\Entity\Pizza;
use App\Repository\PizzaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PizzaController extends AbstractController
{
    /**
     * @Route("/pizza", name="pizza")
     */
    public function index(PizzaRepository $repository, EntityManagerInterface $em)
    {
        return $this->render('pizza/index.html.twig', [
            'pizza' => $repository->findAll(),
        ]);
    }
}
