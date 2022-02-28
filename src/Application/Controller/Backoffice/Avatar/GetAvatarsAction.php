<?php

namespace App\Application\Controller\Backoffice\Avatar;

use App\Action;
use App\Domain\Entity\Avatar;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class GetAvatarsAction extends AbstractController implements Action
{
    private $managerRegistry;
    private $normalizer;

    public function __construct(
        ManagerRegistry $managerRegistry,
        NormalizerInterface $normalizer
    )
    {
        $this->managerRegistry = $managerRegistry;
        $this->normalizer = $normalizer;
    }

    public function __invoke(Request $request): Response
    {
        $animals = $this->managerRegistry->getRepository(Avatar::class)->findAll();

        return new JsonResponse($this->normalizer->normalize($animals, 'json', ['groups' => ['avatar_list']]));

    }
}