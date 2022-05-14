<?php
declare(strict_types=1);

namespace App\Content\Domain;
use Doctrine\Common\Collections\ArrayCollection;

class Post
{
    private PostId $Id;
    private string $title;
    private string $content;
    private PostStatus $status;
    private \DateTime $createdAt;
    private \DateTime $updatedAt;

    public function __construct(PostId $Id,string $title,string $content)
    {
        $this->Id = $Id;
        $this->title = $title;
        $this->content = $content;
        $this->status = PostStatus::DRAFT();
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    public static function draft(string $title, string $content):self
    {
        return new static(PostId::generate(),$title,$content);
    }

    public function status():PostStatus
    {
        return $this->status;
    }

    public function changeTitle(string $newTitle):void
    {
        $this->title = $newTitle;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function changeContent(string $newContent)
    {
        $this->content = $newContent;
    }

    public function content():string
    {
        return $this->content;
    }

    public function Id():PostId
    {
        return $this->Id;
    }

}