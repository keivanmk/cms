<?php

namespace App\Content\Infrastructure\Controllers;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Content\Application\PublishPost\PublishPostCommand;
use App\Framework\Application\Command\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PublishPostController extends AbstractController
{

    public function __construct(
        private readonly CommandBus $messageBus
    )
    {
    }

    #[Route('/posts', name: 'publish_a_post',methods: 'PUT')]
    public function publishPost(Request $request):Response
    {
        $this->messageBus->dispatch(new PublishPostCommand($request->get('post_id')));
        return $this->json(['success' => true, 'message' => 'مطلب با موفقیت منتشر شد']);
    }

}