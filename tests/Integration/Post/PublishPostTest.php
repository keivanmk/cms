<?php

namespace App\Tests\Integration\Post;
use App\Content\Domain\Post;
use App\Content\Domain\PostId;
use App\Tests\Shared\IntegrationTestCase;
use App\Content\Application\DraftPost\DraftPostCommand;
use App\Framework\Application\Event\EventBus;
use App\Content\Application\DraftPost\DraftPostHandler;
use App\Content\Domain\PostRepositoryInterface;
use App\Content\Application\PublishPost\PublishPostCommand;
use App\Content\Application\PublishPost\PublishPostHandler;

class PublishPostTest extends IntegrationTestCase
{
    /** @test */
    public function publish_a_post():void
    {
        //arrange
        /** @var PostRepositoryInterface $postRepository */
        $postRepository = $this->container->get('App\Content\Domain\PostRepositoryInterface');
        $eventBus = \Mockery::spy(EventBus::class);
        $newPostId = PostId::nextId();
        $draftPost = Post::draft($newPostId,$this->faker()->sentence(),$this->faker()->sentence());
        $postRepository->add($draftPost);
        $publishCommand = new PublishPostCommand($newPostId);
        $sut = new PublishPostHandler($postRepository,$eventBus);

        //act
        $sut($publishCommand);

        //assert
        $post= $postRepository->ofId($newPostId);
        $this->assertTrue($post->isPublished());

    }
}