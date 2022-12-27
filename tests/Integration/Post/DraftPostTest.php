<?php

namespace App\Tests\Integration\Post;

use Mockery\Mock;
use App\Content\Domain\Post;
use App\Tests\Shared\IntegrationTestCase;
use App\Framework\Application\Event\EventBus;
use App\Content\Domain\PostRepositoryInterface;
use App\Content\Application\DraftPost\DraftPostHandler;
use App\Content\Application\DraftPost\DraftPostCommand;

class DraftPostTest extends IntegrationTestCase
{
    /** @test */
    public function draft_a_post(): void
    {
        //arrange
        /** @var PostRepositoryInterface $postRepository */
        $postRepository = $this->container->get('App\Content\Domain\PostRepositoryInterface');
        $expectedTitle = $this->faker()->sentence();
        $draftPostRequest = new DraftPostCommand($expectedTitle, $this->faker()->sentence());
        $eventBus = \Mockery::spy(EventBus::class);
        $sut = new DraftPostHandler($postRepository,$eventBus);

        //act
        $sut($draftPostRequest);

        //assert
        $post = $postRepository->findOneBy(['title' => $expectedTitle]);
        $this->assertInstanceOf(Post::class, $post);
        $this->assertEquals($expectedTitle, $post->title());
    }
}