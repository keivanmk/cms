<?php

namespace App\Content\Domain;

use App\Framework\Domain\Enum;

/**
 * * @method static static DRAFT()
 */
class PostStatus extends Enum
{
    private const DRAFT = 1;
}