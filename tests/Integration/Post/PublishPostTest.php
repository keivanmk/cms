<?php

namespace App\Tests\Integration\Post;
use App\Content\Domain\Post;
use App\Content\Domain\PostId;
use App\Tests\Shared\IntegrationTestCase;
use App\Content\Application\DraftPostCommand;
use App\Framework\Application\Event\EventBus;
use App\Content\Application\DraftPostHandler;
use App\Content\Domain\PostRepositoryInterface;
use App\Content\Application\PublishPostCommand;
use App\Content\Application\PublishPostHandler;

class PublishPostTest extends IntegrationTestCase
{
    /** @test */
    public function publish_a_post():void
    {
        //arrange
        /** @var PostRepositoryInterface $postRepository */
        $postRepository = $this->em->getRepository('ContentBundle:Post');
        $eventBus = \Mockery::spy(EventBus::class);
        $newPostId = PostId::nextId();
        $draftPost = Post::draft($newPostId,$this->faker()->sentence(),$this->faker()->sentence());
        $postRepository->save($draftPost);
        $publishCommand = new PublishPostCommand($newPostId);
        $sut = new PublishPostHandler($postRepository,$eventBus);

        //act
        $sut($publishCommand);

        //assert
        $post= $postRepository->ofId($newPostId);
        $this->assertTrue($post->isPublished());

    }
}