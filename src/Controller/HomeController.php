<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response as Response;
use Symfony\Component\Routing\Annotation\Route as Route;

class HomeController extends AbstractController
{
	#[Route('/', name: 'home.index', methods: ['GET'])]
	public function index(): Response
	{
		return $this->render('home.html.twig');
	}
}

?>