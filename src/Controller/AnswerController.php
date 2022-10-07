<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Answers;

/**
 * @Route("/answer", name="answer_")
 */
class AnswerController extends AbstractController
{
	/**
	 * @Route("/", name="index", methods={"GET"})
	 */
	public function index(): Response
	{
		$data = $this->getDoctrine()->getRepository(Answers::class)->findAll();

		return $this->json($data);
	}
}
