<?php

namespace App\Tests\Unit;

use Faker\Factory;
use Faker\Generator;
use App\Content\Domain\Post;
use App\Content\Domain\PostId;
use App\Content\Domain\PostStatus;
use PHPUnit\Framework\TestCase;
use Zenstruck\Foundry\Test\Factories;

class PostTest extends TestCase
{

    /** @test */
    public function new_post_is_a_draft_post():void
    {
        //arrange
        //act
        $sut = new Post(PostId::nextId(), 'sample post title', 'sample post content');
        //assert
        $this->assertEquals(PostStatus::DRAFT(), $sut->status());
    }

    /** @test */
    public function updating_post_title():void
    {
        //arrange
        $sut = new Post(PostId::nextId(), 'sample post title', 'sample post content');
        $postNewTitle = 'this is new title';
        //act
        $sut->changeTitle($postNewTitle);
        //assert
        $this->assertEquals($postNewTitle, $sut->title());
    }

    /** @test */
    public function updating_post_content():void
    {
        //arrange
        $sut = new Post(PostId::nextId(), 'sample post title', 'sample post content');
        $postNewContent = 'this is new content';
        //act
        $sut->changeContent($postNewContent);
        //assert
        $this->assertEquals($postNewContent, $sut->content());
    }

    /** @test */
    public function publish_a_post():void
    {
        //arrange
        $sut = Post::draft(PostId::nextId(), $this->faker()->sentence(), $this->faker()->sentence());
        //act
        $sut->publish();
        //assert
        $this->assertTrue($sut->isPublished());
    }

    private function faker(): Generator
    {
        return Factory::create();
    }
}