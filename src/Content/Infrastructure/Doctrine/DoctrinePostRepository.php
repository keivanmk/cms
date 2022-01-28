<?php

namespace App\Content\Infrastructure\Doctrine;
use App\Content\Domain\Post;
use App\Content\Domain\PostRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class DoctrinePostRepository implements PostRepositoryInterface
{
    private readonly EntityManagerInterface $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(Post $post)
    {
        $this->entityManager->persist($post);
        $this->entityManager->flush();
    }
}