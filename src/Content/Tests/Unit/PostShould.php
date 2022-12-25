<?php

namespace App\Content\Tests\Unit;
use App\Content\Domain\Post;
use App\Content\Domain\PostId;
use PHPUnit\Framework\TestCase;
use App\Content\Domain\PostStatus;
use Zenstruck\Foundry\Test\Factories;
use function Zenstruck\Foundry\faker;

class PostShould extends TestCase
{
    use Factories;
    /** @test */
    public function have_be_able_to_publish()
    {
        //arrange
        $postId = PostId::nextId();
        $postTitle = faker()->sentence();
        $postContent = faker()->sentence();
        $sut = new Post($postId,$postTitle,$postContent);
        //act
        $sut->publish();
        //assert
        $this->assertTrue($sut->isPublished());
    }
}