<?php

namespace App\Application\Controller\Backoffice\Animal;

use App\Action;
use App\Domain\Service\AnimalService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class GetAnimalsAction implements Action
{
    private $animalService;
    private $normalizer;

    public function __construct(
        AnimalService $animalService,
        NormalizerInterface $normalizer
    )
    {
        $this->animalService = $animalService;
        $this->normalizer = $normalizer;
    }

    public function __invoke(Request $request): Response
    {
        $animals = $this->animalService->getAnimals();

        return new JsonResponse($this->normalizer->normalize($animals, JsonEncoder::FORMAT, ['groups' => ['animal_list']]));

    }
}