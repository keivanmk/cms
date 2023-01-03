<?php

namespace App\Content\Infrastructure\Controllers;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Content\Application\HomePagePostsList\HomePagePostsListRepository;

class HomePagePostsListController extends AbstractController
{

    public function __construct(private readonly HomePagePostsListRepository $homePagePostsListRepository)
    {
    }

    #[Route('/home/posts',name: 'home_posts',methods: 'GET')]
    public function __invoke(Request $request):Response
    {
        $posts = $this->homePagePostsListRepository->list();
        return $this->json([
            'data' => array_map(fn($post)=> json_decode($post),$posts)
        ]);
    }
}