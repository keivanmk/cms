<?php

namespace App\Content\Infrastructure\Persistence\Redis;
use SymfonyBundles\RedisBundle\Redis\Client;
use SymfonyBundles\RedisBundle\Redis\ClientInterface;
use App\Content\Application\HomePagePostsList\HomePagePostsListRepository;

class HomePagePostsListRedisRepository implements HomePagePostsListRepository
{
    private const REDIS_KEY = 'HOME_PAGE_POSTS';
    public function __construct(private readonly ClientInterface $redis)
    {
    }

    public function add(array $post): void
    {
        $this->redis->lpush(self::REDIS_KEY,json_encode($post));
    }

    public function list(): array
    {
        return  $this->redis->lrange(self::REDIS_KEY,0,-1);
    }
}