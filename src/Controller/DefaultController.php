<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/admin", name="admin")
     * @return Response
     */
    public function admin()
    {
        return new Response("<html><body><h1>Admin Page</h1></body>");
    }

    /**
     * @Route("/admin/dashboard", name="dashboard")
     * @return Response
     */
    public function dashboard()
    {
        return new Response("<html><body><h1>Admin Dashboard Page</h1></body>");
    }

    /**
     * @Route("/admin/relatorios", name="relatorios")
     * @return Response
     */
    public function relatorios()
    {
        return new Response("<html><body><h1>Admin Relatorios Page</h1></body>");
    }

}
