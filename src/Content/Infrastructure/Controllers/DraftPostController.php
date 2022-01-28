<?php

namespace App\Content\Infrastructure\Controllers;

use App\Content\UseCases\DraftPost;
use App\Content\UseCases\DraftPostRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DraftPostController extends AbstractController
{
    private readonly DraftPost $draftPost;

    /**
     * @param DraftPost $draftPost
     */
    public function __construct(DraftPost $draftPost)
    {
        $this->draftPost = $draftPost;
    }

    #[Route('/posts', name: 'posts_list')]
    public function index(): Response
    {
        $this->draftPost->execute(new DraftPostRequest('new post from me','test content'));
        return $this->json(['success' => true, 'data' => []]);
    }
}