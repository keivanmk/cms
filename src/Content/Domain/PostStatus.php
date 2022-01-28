<?php

namespace App\Content\Domain;
use App\Shared\Domain\Enum;

/**
 * * @method static static DRAFT()
 */
class PostStatus extends Enum
{
    private const DRAFT = 1;
}