<?php

namespace App\Content\Infrastructure\Doctrine\Types;
use App\Content\Domain\Post;
use App\Content\Domain\PostId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class PostIdType extends Type
{
    private const TYPE = 'id';
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getStringTypeDeclarationSQL($column);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform):mixed
    {
        return $value->value();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): PostId
    {
        return new PostId($value);
    }

    public function getName(): string
    {
        return self::TYPE;
    }
}