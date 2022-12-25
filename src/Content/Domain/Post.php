<?php
declare(strict_types=1);

namespace App\Content\Domain;
use App\Content\Domain\Events\PostPublished;
use Doctrine\Common\Collections\ArrayCollection;
use App\Framework\Domain\EventRecordingCapabilities;

class Post
{
    use EventRecordingCapabilities;

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

    public static function draft(PostId $Id,string $title,string $content):Post
    {
        return new Post($Id,$title,$content);
    }
    public function changeTitle(string $newTitle):void
    {
        $this->title = $newTitle;
    }

    public function changeContent(string $newContent): void
    {
        $this->content = $newContent;
    }

    public function publish():void{
        $this->status = PostStatus::PUBLISHED();
        $this->record(PostPublished::create($this->Id,$this->title,$this->content));
    }

    public function status():PostStatus
    {
        return $this->status;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function content():string
    {
        return $this->content;
    }

    public function Id():PostId
    {
        return $this->Id;
    }

    public function isPublished():bool
    {
        return  $this->status->is(PostStatus::PUBLISHED());
    }

    public function isDraft():bool
    {
        return  $this->status->is(PostStatus::DRAFT());
    }

}