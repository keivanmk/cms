<?php

namespace App\Content\UseCases;
class DraftPostRequest
{
    private $title;

    private $content;

    /**
     * @param string $title
     * @param string $content
     */
    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    public function title():string
    {
        return $this->title;
    }

    public function content():string
    {
        return $this->content;
    }

}