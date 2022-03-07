<?php

namespace App\Application\Controller\Backoffice\Animal;

use App\Action;
use App\Domain\Entity\Animal;
use App\Domain\Service\AnimalService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class PutAnimalAction implements Action
{
    private $animalService;
    private $serializer;

    public function __construct(
        AnimalService $animalService,
        SerializerInterface $serializer
    )
    {
        $this->animalService = $animalService;
        $this->serializer = $serializer;
    }

    public function __invoke(Request $request): Response
    {
        $id = $request->attributes->getInt('id');

        $content = json_decode($request->getContent());



        $putAnimal = $this->serializer->deserialize($request->getContent(),Animal::class,'jsom');
        if (!$putAnimal instanceof Animal) {
            throw new \Exception('Deserialization failed');
        }



        $animal = $this->animalService->getAnimal($id);

        return new Response();


    }
}