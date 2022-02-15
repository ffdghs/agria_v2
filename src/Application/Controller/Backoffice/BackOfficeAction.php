<?php

namespace App\Application\Controller\Backoffice;

use App\Action;
use App\Domain\Entity\User;
use Doctrine\DBAL\DriverManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BackOfficeAction extends AbstractController implements Action
{
    private $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function __invoke(Request $request): Response
    {
        $connectionParams = [
            'url' => $this->url,
            'charset' => 'UTF8'
        ];
        $conn = DriverManager::getConnection($connectionParams);
        
        $sql = "SELECT * FROM   INFORMATION_SCHEMA.TABLES WHERE Table_Type='BASE TABLE' AND TABLE_SCHEMA='agria';";

        $query = $conn->prepare($sql);

        $tables = $query->executeQuery()->fetchAllAssociative();

        $users = $this->getDoctrine()->getRepository(User::class)->findby([],['id' => 'DESC'],3,NULL);

        return $this->render('_backOffice/index.backoffice.html.twig', [
            'tables' => $tables,
            'users' => $users
        ]);
    }
}
