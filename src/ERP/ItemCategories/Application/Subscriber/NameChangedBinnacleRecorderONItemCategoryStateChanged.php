<?php

declare(strict_types=1);

namespace Medine\ERP\ItemCategories\Application\Subscriber;

use Medine\ERP\ItemCategories\Domain\Event\NameChagedDomainEvent;
use Medine\ERP\Shared\Domain\Bus\Event\DomainEventSubscriber;

class NameChangedBinnacleRecorderONItemCategoryStateChanged implements DomainEventSubscriber
{

    public static function subscribedTo(): array
    {
        return [NameChagedDomainEvent::class];
    }

    public function __invoke(NameChagedDomainEvent $event)
    {}
}
