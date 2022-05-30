<?php

namespace App\Content\Infrastructure\Controllers;

use App\Shared\Application\CommandBus;
use App\Content\Application\DraftPostHandler;
use App\Content\Application\DraftPostCommand;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class DraftPostController extends AbstractController
{
    /**
     * @param DraftPostHandler $draftPost
     * @param ValidatorInterface $validator
     * @param CommandBus $messageBus
     */
    public function __construct(
        private readonly DraftPostHandler   $draftPost,
        private readonly ValidatorInterface $validator,
        private readonly CommandBus $messageBus
    )
    {
    }

    #[Route('/posts', name: 'draft_a_post',methods: 'POST')]
    public function index(Request $request): Response
    {
        $errors = $this->validateDraftPostRequest($request);
        if($errors->count()){
            return  $this->json(['message' => $errors[0]->getMessage()],422);
        }
//        $this->draftPost->execute(new DraftPostCommand($request->get('title'),$request->get('content')));
        $this->messageBus->dispatch(new DraftPostCommand($request->get('title'),$request->get('content')));
        return $this->json(['success' => true, 'message' => 'مطلب جدید با موفقیت اضافه شد']);
    }

    /**
     * @param Request $request
     * @return ConstraintViolationListInterface
     */
    private function validateDraftPostRequest(Request $request): ConstraintViolationListInterface
    {
        return $this->validator->validate(['title' => $request->get('title'), 'content' => $request->get('content')], new Collection(['title' => new NotBlank(message: 'عنوان نمی تواند خالی باشد'), 'content' => new NotBlank(message: 'محتوای مطلب نمی تواند خالی باشد')]));
    }
}