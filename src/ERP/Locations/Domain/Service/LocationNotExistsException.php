<?php


namespace Medine\ERP\Locations\Domain\Service;


use Medine\ERP\Locations\Domain\ValueObject\LocationId;

class LocationNotExistsException extends \InvalidArgumentException
{
    public function __construct(LocationId $id)
    {
        $message = "The Location with id: {$id->value()} do not exists.";
        parent::__construct($message);
    }
}
