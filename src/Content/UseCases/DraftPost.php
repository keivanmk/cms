<?php

namespace App\Content\UseCases;
use App\Content\Domain\Post;
use App\Content\Domain\PostRepositoryInterface;

class DraftPost
{
    private PostRepositoryInterface $postRepository;

    /**
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function execute(DraftPostRequest $request)
    {
        $post = Post::draft($request->title(),$request->content());
        $this->postRepository->save($post);
    }
}