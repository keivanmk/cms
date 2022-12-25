<?php

namespace App\Content\Domain;

use App\Framework\Domain\Enum;

/**
 * * @method static static DRAFT()
 * * @method static static PUBLISHED()
 */
class PostStatus extends Enum
{
    private const DRAFT = 1;
    private const PUBLISHED = 2;
}