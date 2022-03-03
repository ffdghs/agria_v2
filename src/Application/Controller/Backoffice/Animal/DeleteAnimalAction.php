<?php

namespace App\Application\Controller\Backoffice\Animal;

use App\Action;
use App\Domain\Service\AnimalService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteAnimalAction implements Action
{
    private $animalService;

    public function __construct(
        AnimalService $animalService
    )
    {
        $this->animalService = $animalService;
    }

    public function __invoke(Request $request): Response
    {
        $id = $request->attributes->get('id');

        $this->animalService->deleteAnimal($id);

        return new Response(null, Response::HTTP_NO_CONTENT);
    }

}