<?php

declare(strict_types=1);

namespace Medine\ERP\ItemCategories\Application\Subscriber;

use Medine\ERP\ItemCategories\Domain\Event\ItemCategoryStateChangedDomainEvent;
use Medine\ERP\Shared\Domain\Bus\Event\DomainEventSubscriber;

class StateChangeBinnacleRecorderOnItemCategoryStateChanged implements DomainEventSubscriber
{

    public static function subscribedTo(): array
    {
        return [ItemCategoryStateChangedDomainEvent::class];
    }

    public function __invoke(ItemCategoryStateChangedDomainEvent $event)
    {
    }
}
