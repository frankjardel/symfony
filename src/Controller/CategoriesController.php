<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Categories;

/**
 * @Route("/category", name="category_")
 */
class CategoriesController extends AbstractController
{
	/**
	 * @Route("/", name="index", methods={"GET"})
	 */
	public function index()
	{
		$categories = $this->getDoctrine()->getRepository(Categories::class)->findAll();

		return $this->json([
			'status' 	 => true,
			'categories' => $categories
		]);
	}

	/**
	 * @Route("/{id}", name="show", methods={"GET"})
	 */
	public function show($id)
	{
		$categories = $this->getDoctrine()->getRepository(Categories::class)->find($id);

		return $this->json([
			'status' 	 => true,
			'categories' => $categories
		]);
	}

	/**
	 * @Route("/", name="create", methods={"POST"})
	 */
	public function create(Request $request)
	{
		$data = $request->request->all();

		$category = new Categories();
		$category->setTitle($data['title']);
		$category->setSlug($data['slug']);

		$category->setCreatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));
		$category->setUpdatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));

		$doctrine = $this->getDoctrine()->getManager();

		$doctrine->persist($category);
		$doctrine->flush();

		return $this->json([
			'status'  => true,
			'message' => 'Success'
		]);
	}

	/**
	 * @Route("/{id}", name="update", methods={"PUT", "PATCH"})
	 */
	public function update($id, Request $request)
	{
		$data = $request->request->all();

		$category = $this->getDoctrine()->getRepository(Categories::class)->find($id);

		if($request->request->has('title'))
			$category->setTitle($data['title']);

		if($request->request->has('slug'))
			$category->setSlug($data['slug']);

		$category->setUpdatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));

		$doctrine = $this->getDoctrine()->getManager();
		$doctrine->flush();

		return $this->json([
			'status'  => true,
			'message' => 'Success'
		]);
	}

	/**
	 * @Route("/{id}", name="delete", methods={"DELETE"})
	 */
	public function delete($id)
	{
		$category = $this->getDoctrine()->getRepository(Categories::class)->find($id);
		$manager = $this->getDoctrine()->getManager();
		$manager->remove($category);
		$manager->flush();

		return $this->json([
			'status'  => true,
			'message' => "Categoria N° {$id} deletada com Sucesso"
		]);
	}
}
