<?php


namespace Medine\ERP\ItemCategories\Domain\Event;


use Medine\ERP\Shared\Domain\Bus\Event\DomainEvent;

class ItemCategoryStateChangedDomainEvent extends DomainEvent
{
    private $state;
    private $stateNew;

    public function __construct(
        string $id,
        string $state,
        string $stateNew ,
        string $eventId = null,
        string $occurredOn = null
    )
    {
        parent::__construct($id, $eventId, $occurredOn);
        $this->state = $state;
        $this->stateNew = $stateNew;
    }


    public static function fromPrimitives(string $aggregateId, array $body, string $eventId, string $occurredOn): DomainEvent
    {
        return new self($aggregateId, $body['state'], $body['stateNew'], $eventId, $occurredOn);
    }

    public static function eventName(): string
    {
        return 'change_state';
    }

    public function toPrimitives(): array
    {
        return [
            'state' => $this->state,
            'stateNew' => $this->stateNew
        ];
    }

    /**
     * @return string
     */
    public function state(): string
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function stateNew(): string
    {
        return $this->stateNew;
    }
}
