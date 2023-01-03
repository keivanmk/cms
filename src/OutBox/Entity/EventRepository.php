<?php

namespace App\OutBox\Entity;
use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

final class EventRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry,Event::class);
    }

    public function add(Event $event):void
    {
        $this->_em->persist($event);
    }
}