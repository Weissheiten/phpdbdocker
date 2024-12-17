<?php

namespace Htlw3r\Dockerwebdemo\Model\Repository;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Tools\DsnParser;
use Htlw3r\Dockerwebdemo\Model\Entity\User;

class UserRepository
{
    private Connection $connection;

    public function __construct(string $connectionstring){
        $dsnParser = new DsnParser();
        $connectionParams = $dsnParser
            ->parse($connectionstring);
        $this->connection = DriverManager::getConnection($connectionParams);
    }

    public function findAll() : array{
        $queryBuilder = $this->connection->createQueryBuilder();
        $queryBuilder
            ->select('id', 'name')
            ->from('demo_table');

        $results = $queryBuilder->executeQuery()->fetchAllAssociative();

        $users = [];
        foreach($results as $result){
            $users[] = new User($result['ID'], $result['name']);
        }
        return $users;
    }
}