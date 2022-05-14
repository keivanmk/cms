<?php

namespace App\Tests\Unit;
use App\Content\Domain\Post;
use App\Content\Domain\PostId;
use App\Content\Domain\PostStatus;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    /** @test */
    public function new_post_is_a_draft_post()
    {
        //arrange
        //act
        $sut = new Post(
            PostId::generate(),
            'sample post title',
            'sample post content'
        );
        //assert
        $this->assertEquals(PostStatus::DRAFT(),$sut->status());
    }

    /** @test */
    public function updating_post_title()
    {
        //arrange
        $sut = new Post(
            PostId::generate(),
            'sample post title',
            'sample post content'
        );
        $postNewTitle = 'this is new title';
        //act
        $sut->changeTitle($postNewTitle);
        //assert
        $this->assertEquals($postNewTitle,$sut->title());
    }

    /** @test */
    public function updating_post_content()
    {
        //arrange
        $sut = new Post(
            PostId::generate(),
            'sample post title',
            'sample post content'
        );
        $postNewContent = 'this is new content';
        //act
        $sut->changeContent($postNewContent);
        //assert
        $this->assertEquals($postNewContent,$sut->content());
    }
}