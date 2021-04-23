<?php

declare(strict_types=1);

namespace Medine\ERP\Clients\Domain\Events;

use Medine\ERP\Clients\Domain\ValueObjects\ClientState;
use Medine\ERP\Shared\Domain\Bus\Event\DomainEvent;

final class ClientInactivatedDomainEvent extends DomainEvent
{
    private $name;
    private $stateOld;
    private $stateNew;

    public function __construct(
        string $id,
        string $name,
        ClientState $stateOld,
        ClientState $stateNew,
        string $eventId = null,
        string $occurredOn = null
    )
    {
        parent::__construct($id, $eventId, $occurredOn);
        $this->name = $name;
        $this->stateOld = $stateOld;
        $this->stateNew = $stateNew;
    }

    public static function fromPrimitives(string $aggregateId, array $body, string $eventId, string $occurredOn): DomainEvent
    {
        return new self($aggregateId, $body['name'], $body['stateOld'], $body['stateNew'], $eventId, $occurredOn);
    }

    public static function eventName(): string
    {
        return 'show_dd_in_event.update';
    }

    public function toPrimitives(): array
    {
        return [
            'name' => $this->name,
            'stateOld' => $this->stateOld,
            'stateNew' => $this->stateNew
        ];
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    public function stateOld(): ClientState
    {
        return $this->stateOld;
    }

    public function stateNew(): ClientState
    {
        return $this->stateNew;
    }
}
