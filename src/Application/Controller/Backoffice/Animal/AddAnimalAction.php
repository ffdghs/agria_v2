<?php

namespace App\Application\Controller\Backoffice\Animal;

use App\Action;
use App\Domain\Entity\Animal;
use App\Domain\Service\AnimalService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class AddAnimalAction implements Action
{
    private $animalService;
    private $serializer;
    private $normalizer;

    public function __construct(
        AnimalService $animalService,
        SerializerInterface $serializer,
        NormalizerInterface $normalizer
    )
    {
        $this->animalService = $animalService;
        $this->serializer = $serializer;
        $this->normalizer = $normalizer;
    }

    public function __invoke(Request $request): Response
    {
        try {
            $animal = $this->serializer->deserialize($request->getContent(), Animal::class, JsonEncoder::FORMAT);
            if (!$animal instanceof Animal) {
                throw new \Exception('Deserialization failed');
            }
        } catch (\Exception $e) {
            throw new BadRequestHttpException('Bad request');
        }

        $animal = $this->animalService->saveAnimal($animal);

        return new JsonResponse($this->normalizer->normalize($animal, JsonEncoder::FORMAT, ['groups' => ['animal_list']]));
    }

}