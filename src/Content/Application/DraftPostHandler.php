<?php

namespace App\Content\Application;

use App\Content\Domain\Post;
use App\Content\Domain\PostRepositoryInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class DraftPostHandler implements MessageHandlerInterface
{
    private PostRepositoryInterface $postRepository;

    /**
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function __invoke(DraftPostCommand $request): void
    {
        $post = Post::draft($request->title(), $request->content());
        $this->postRepository->save($post);
    }
}