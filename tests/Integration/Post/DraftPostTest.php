<?php

namespace App\Tests\Integration\Post;

use App\Content\Domain\Post;
use App\Tests\Shared\IntegrationTestCase;
use App\Content\Domain\PostRepositoryInterface;
use App\Content\UseCases\DraftPost;
use App\Content\UseCases\DraftPostRequest;

class DraftPostTest extends IntegrationTestCase
{
    /** @test */
    public function draft_a_post(): void
    {
        /** @var PostRepositoryInterface $postRepository */
        $postRepository = $this->em->getRepository('ContentBundle:Post');
        $draftPostRequest = new DraftPostRequest('sample title', 'sample content');
        $sut = new DraftPost($postRepository);
        //act
        $sut->execute($draftPostRequest);
        //assert
        $post = $postRepository->findOneBy(['title' => 'sample title']);
        $this->assertInstanceOf(Post::class, $post);
        $this->assertEquals('sample title', $post->title());
    }
}