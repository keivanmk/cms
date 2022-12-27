<?php

namespace App\Content\Application\DraftPost;


use App\Framework\Application\Command\Command;
use App\Framework\Application\Command\AsyncCommand;

final class DraftPostCommand implements Command
{
    private string $title;

    private string $content;

    /**
     * @param string $title
     * @param string $content
     */
    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function content(): string
    {
        return $this->content;
    }

}