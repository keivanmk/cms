<?php

namespace App\Content\Infrastructure\Controllers;

use App\Content\UseCases\DraftPost;
use App\Content\UseCases\DraftPostRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DraftPostController extends AbstractController
{
    /**
     * @param DraftPost $draftPost
     */
    public function __construct(
        private readonly DraftPost $draftPost,
    )
    {
    }

    #[Route('/posts', name: 'draft_a_post')]
    public function index(Request $request): Response
    {

        $this->draftPost->execute(new DraftPostRequest($request->get('title'),$request->get('content')));
        return $this->json(['success' => true, 'data' => []]);
    }
}