<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
    /**
     * @Route("/", name="list")
     */
    public function index()
    {
        $companies = [
            'Apple' => '$1.16 trillion USD',
            'Samsung' => '$298.68 billion USD',
            'Microsoft' => '$1.10 trillion USD',
            'Alphabet' => '$878.48 billion USD',
            'Intel Corporation' => '$245.82 billion USD',
            'IBM' => '$120.03 billion USD',
            'Facebook' => '$552.39 billion USD',
            'Hon Hai Precision' => '$38.72 billion USD',
            'Tencent' => '$3.02 trillion USD',
            'Oracle' => '$180.54 billion USD',
        ];

        return $this->render('list/index.html.twig', [
            'companies' => $companies,
        ]);
    }

    /**
     * @Route("/aboutUs", name="aboutUs")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function aboutUs()
    {
        return $this->render('list/about_us.html.twig');
    }

    /**
     * @Route("/services", name="services")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function services()
    {
        return $this->render('list/services.html.twig');
    }
}
