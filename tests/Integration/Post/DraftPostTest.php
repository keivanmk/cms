<?php

namespace App\Tests\Integration\Post;

use Mockery\Mock;
use App\Content\Domain\Post;
use App\Tests\Shared\IntegrationTestCase;
use App\Framework\Application\Event\EventBus;
use App\Content\Domain\PostRepositoryInterface;
use App\Content\Application\DraftPostHandler;
use App\Content\Application\DraftPostCommand;

class DraftPostTest extends IntegrationTestCase
{
    /** @test */
    public function draft_a_post(): void
    {
        //arrange
        /** @var PostRepositoryInterface $postRepository */
        $postRepository = $this->em->getRepository('ContentBundle:Post');
        $draftPostRequest = new DraftPostCommand('sample title', 'sample content');
        $eventBus = \Mockery::spy(EventBus::class);
        $sut = new DraftPostHandler($postRepository,$eventBus);

        //act
        $sut($draftPostRequest);

        //assert
        $post = $postRepository->findOneBy(['title' => 'sample title']);
        $this->assertInstanceOf(Post::class, $post);
        $this->assertEquals('sample title', $post->title());
    }
}