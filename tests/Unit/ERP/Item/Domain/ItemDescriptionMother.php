<?php

declare(strict_types=1);

namespace Tests\Unit\ERP\Item\Domain;

use Medine\ERP\Item\Domain\ValueObjects\ItemDescription;
use Tests\Unit\ERP\Shared\Domain\LongTextMother;

final class ItemDescriptionMother
{
    public static function create(string $description): ItemDescription
    {
        return new ItemDescription($description);
    }

    public static function random(): ItemDescription
    {
        return self::create(
            LongTextMother::random()
        );
    }
}
