<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    // add route to list users
    #[Route('/admin/users', name: 'admin_users')]
    public function users(): Response
    {
        return $this->render('admin/users.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    // add route to list events
    #[Route('/admin/events', name: 'admin_events')]
    public function events(): Response
    {
        return $this->render('admin/events.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    // add route to list artists
    #[Route('/admin/artists', name: 'admin_artists')]
    public function artists(): Response
    {
        return $this->render('admin/artists.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    // add route to list places
    #[Route('/admin/places', name: 'admin_places')]
    public function places(): Response
    {
        return $this->render('admin/places.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    //add route to list medias
    #[Route('/admin/medias', name: 'admin_medias')]
    public function medias(): Response
    {
        return $this->render('admin/medias.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    //add route to list requests
    #[Route('/admin/requests', name: 'admin_requests')]
    public function requests(): Response
    {
        return $this->render('admin/requests.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
