<?php

namespace App\Controller;

use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @Template("default/index.html.twig")
     * @return Response
     */
    public function admin()
    {
        $texto = "Esse usuário  não é admin.";

        if($this->isGranted("ROLE_ADMIN")) {
            $texto = "Esse usuário é um Administrador.";
        }
        return [
            'texto' => $texto
        ];
    }

    /**
     * @Route("/admin/dashboard", name="dashboard")
     * @Template("default/dashboard.html.twig")
     * @return Response
     */
    public function dashboard()
    {
        return [];
    }

    /**
     * @Route("/admin/relatorios", name="relatorios")
     * @Template("default/relatorios.html.twig")
     * @return Response
     */
    public function relatorios()
    {
        return [];
    }

    /**
     * @param Request $request
     *
     * @Route("/insert")
     * @return Response
     */
    public function insert(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $user = new User();
        $user->setUsername("rafael");
        $user->setEmail("rafael@email.com");
        $user->setRoles("ROLE_USER");

        $encoder = $this->get("security.password_encoder");
        $pass = $encoder->encodePassword($user, "abc");
        $user->setPassword($pass);
        $em->persist($user);

        $user = new User();
        $user->setUsername("admin");
        $user->setEmail("admin@email.com");
        $user->setRoles("ROLE_ADMIN");

        $encoder = $this->get("security.password_encoder");
        $pass = $encoder->encodePassword($user, "123");
        $user->setPassword($pass);
        $em->persist($user);

        $em->flush();

        return new Response("<h1>Inserido com sucesso!</h1>");

    }
}
