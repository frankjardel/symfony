<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Questions;

/**
 * @Route("/question", name="question_")
 */
class QuestionController extends AbstractController
{
	/**
	* @Route("/", name="question", methods={"GET"})
	*/
	public function index(): Response
	{
		$data = $this->getDoctrine()->getRepository(Questions::class)->findAll();

		return $this->json($data);
	}
}
