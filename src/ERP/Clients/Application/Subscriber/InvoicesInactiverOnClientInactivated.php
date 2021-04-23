<?php

declare(strict_types=1);

namespace Medine\ERP\Clients\Application\Subscriber;

use Medine\ERP\Clients\Domain\Events\ClientInactivatedDomainEvent;

use Medine\ERP\Shared\Domain\Bus\Event\DomainEventSubscriber;

final class InvoicesInactiverOnClientInactivated implements DomainEventSubscriber
{

    public static function subscribedTo(): array
    {
        return [ClientInactivatedDomainEvent::class];
    }

    public function __invoke(ClientInactivatedDomainEvent $event)
    {}
}
