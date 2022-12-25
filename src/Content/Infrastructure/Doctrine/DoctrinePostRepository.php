<?php

namespace App\Content\Infrastructure\Doctrine;

use App\Content\Domain\Post;
use App\Content\Domain\PostId;
use Doctrine\Persistence\ManagerRegistry;
use App\Content\Domain\PostRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityRepository;

class DoctrinePostRepository extends ServiceEntityRepository implements PostRepositoryInterface
{

    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry,Post::class);
    }

    public function ofId(PostId $postId):Post
    {
        return  $this->find($postId);
    }

    public function save(Post $post)
    {
        $this->_em->persist($post);
        $this->_em->flush();
    }
}