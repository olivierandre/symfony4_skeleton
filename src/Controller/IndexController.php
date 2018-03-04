<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    /**
     * @Route("/"),
     */
    public function index()
    {
        $number = mt_rand(0, 100);

        return $this->render('index.html.twig', [
          'title' => 'lucky number',
          'number' => $number,
        ]);
    }

    /**
     * @Route("/api/get/firstname", methods={"GET","HEAD"})
     */
    public function getFirstname()
    {
        $number = mt_rand(0, 100);

        return $this->json([
          'firstname' => 'Olivier'
        ]);
    }
}
