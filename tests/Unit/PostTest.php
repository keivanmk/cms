<?php

use App\Content\Domain\Post;
use App\Content\Domain\PostId;
use App\Content\Domain\PostStatus;

test('new_post_is_a_draft_post',function(){
    //arrange
    //act
    $sut = new Post(
        PostId::generate(),
        'sample post title',
        'sample post content'
    );
    //assert
    expect($sut->status())->toEqual(PostStatus::DRAFT());

});
test('update post title', function () {
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
    expect($sut->title())->toBe($postNewTitle);
});
test('update post content', function () {
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
    expect($sut->content())->toBe($postNewContent);
});