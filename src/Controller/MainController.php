<?php


namespace App\Controller;


use App\Form\EksportType;
use App\Repository\EksportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @return Response
     */
    public function index(Request $request, EksportRepository $eksportRepository): Response
    {
        $form = $this->createForm(EksportType::class);
        $eksporty = null;

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $eksporty = $eksportRepository->findByLokalAndDate(
                ($form->getData()['lokal'])->getLokal(),
                ($form->getData()['dataOd']),
                ($form->getData()['dataDo'])
            );
        }

        return $this->render('home/index.html.twig', [
            'eksportForm' => $form->createView(),
            'eksporty' => $eksporty
        ]);
    }
}