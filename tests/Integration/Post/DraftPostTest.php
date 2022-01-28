<?php

use App\Content\Domain\PostRepositoryInterface;
use App\Content\UseCases\{DraftPost,DraftPostRequest};

test('draft_a_post',function(){
    //arrange
    $postRepository = mock(PostRepositoryInterface::class)
        ->shouldReceive('save')
        ->once()
        ->andReturn(true)
    ->getMock();
    $draftPostRequest = new DraftPostRequest('sample title','sample content');
    $sut = new DraftPost($postRepository);

    //act
    $sut->execute($draftPostRequest);

    //assert


});