<?php

namespace App\Controller;

use App\Repository\IngredientRepository;
use Knp\Component\Pager\PaginatorInterface as Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class IngredientController extends AbstractController
{
	#[Route('/ingredient', name: 'app_ingredient', methods: ['GET'])]
	public function index(
		IngredientRepository $repository,
		Paginator $paginator,
		Request $request
	): Response {
		$ingredients = $paginator->paginate(
			$repository->findAll(),
			$request->query->getInt('page', 1),
			15
		);

		return $this->render('pages/ingredient/index.html.twig', [
			'ingredients' => $ingredients,
		]);
	}

	#[Route('/ingredient/new', name: 'ingredient_new', methods: ['GET', 'POST'])]
	public function new(): Response
	{
		return $this->render('pages/ingredient/new.html.twig');
	}
}
