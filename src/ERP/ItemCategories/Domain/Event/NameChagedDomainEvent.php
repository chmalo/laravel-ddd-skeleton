<?php


namespace Medine\ERP\ItemCategories\Domain\Event;


use Medine\ERP\Shared\Domain\Bus\Event\DomainEvent;

class NameChagedDomainEvent extends DomainEvent
{
    private $name;
    private $nameNew;

    public function __construct(
        string $id,
        string $name,
        string $nameNew ,
        string $eventId = null,
        string $occurredOn = null
    )
    {
        parent::__construct($id, $eventId, $occurredOn);
        $this->name = $name;
        $this->nameNew = $nameNew;
    }


    public static function fromPrimitives(string $aggregateId, array $body, string $eventId, string $occurredOn): DomainEvent
    {
        return new self($aggregateId, $body['name'], $body['nameNew'], $eventId, $occurredOn);
    }

    public static function eventName(): string
    {
        return 'change_name';
    }

    public function toPrimitives(): array
    {
        return [
            'name' => $this->name,
            'nameNew' => $this->nameNew
        ];
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function nameNew(): string
    {
        return $this->nameNew;
    }
}
