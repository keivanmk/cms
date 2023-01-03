<?php

namespace App\Content\Application\HomePagePostsList;
use App\Framework\Application\Projection\ProjectionHandler;

class AddPostToHomePageList implements ProjectionHandler
{

    public function __construct(private readonly HomePagePostsListRepository $homePagePostsListRepository)
    {
    }

    public function __invoke(HomePagePostProjection $projection): void
    {
        $this->homePagePostsListRepository->add([
            'id' => $projection->postId,
            'title' => $projection->title,
            'content' => $projection->content
        ]);
    }
}