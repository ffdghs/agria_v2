<?php

namespace App\Application\Controller\Backoffice\Animal;

use App\Action;
use App\Domain\Entity\Animal;
use App\Domain\Form\AnimalType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AddAnimalAction extends AbstractController implements Action
{
    private $managerRegistry;

    public function __construct(
        ManagerRegistry $managerRegistry
    )
    {
        $this->managerRegistry = $managerRegistry;
    }

    public function __invoke(Request $request): Response
    {
        $animal = new Animal();

        $form = $this->createForm(AnimalType::class, $animal);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
//            $animal->setMainPictureAnimal($urlPhoto);

            $em = $this->managerRegistry->getManager();

            $em->persist($animal);

            $em->flush();

            return $this->redirect($this->generateUrl('agria_get_animals'));
        }

        return $this->render('_backOffice/animal/viewAnimal.html.twig', [
            'form' => $form->createView()
        ]);
    }

}