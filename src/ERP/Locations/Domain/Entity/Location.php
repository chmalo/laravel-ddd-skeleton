<?php

declare(strict_types=1);

namespace Medine\ERP\Locations\Domain\Entity;

use Medine\ERP\Locations\Domain\ValueObject\LocationBarcode;
use Medine\ERP\Locations\Domain\ValueObject\LocationCode;
use Medine\ERP\Locations\Domain\ValueObject\LocationCompanyId;
use Medine\ERP\Locations\Domain\ValueObject\LocationDirection;
use Medine\ERP\Locations\Domain\ValueObject\LocationId;
use Medine\ERP\Locations\Domain\ValueObject\LocationItemState;
use Medine\ERP\Locations\Domain\ValueObject\LocationMainContact;
use Medine\ERP\Locations\Domain\ValueObject\LocationName;
use Medine\ERP\Locations\Domain\ValueObject\LocationState;
use Medine\ERP\Shared\Domain\ValueObjects\DateTimeValueObject;

final class Location
{
    private $id;
    private $code;
    private $name;
    private $mainContact;
    private $barcode;
    private $state;
    private $direction;
    private $companyId;
    private $itemState;
    private $createdAt;
    private $updatedAt;

    public function __construct(
        LocationId $id,
        LocationCode $code,
        LocationName $name,
        LocationMainContact $mainContact,
        LocationBarcode $barcode,
        LocationState $state,
        LocationDirection $direction,
        LocationCompanyId $companyId,
        LocationItemState $itemState,
        DateTimeValueObject $createdAt,
        DateTimeValueObject $updatedAt
    )
    {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
        $this->mainContact = $mainContact;
        $this->barcode = $barcode;
        $this->state = $state;
        $this->direction = $direction;
        $this->companyId = $companyId;
        $this->itemState = $itemState;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public static function create(
        LocationId $id,
        LocationCode $code,
        LocationName $name,
        LocationMainContact $mainContact,
        LocationBarcode $barcode,
        LocationState $state,
        LocationDirection $direction,
        LocationCompanyId $companyId,
        LocationItemState $itemState
    ): self
    {
        return new self(
            $id,
            $code,
            $name,
            $mainContact,
            $barcode,
            new LocationState('to_be_approved'),
            $direction,
            $companyId,
            $itemState,
            DateTimeValueObject::now(),
            DateTimeValueObject::now()

        );
    }

    public static function fromDatabase(
        LocationId $id,
        LocationCode $code,
        LocationName $name,
        LocationMainContact $mainContact,
        LocationBarcode $barcode,
        LocationState $state,
        LocationDirection $direction,
        LocationCompanyId $companyId,
        LocationItemState $itemState,
        DateTimeValueObject $createdAt,
        DateTimeValueObject $updatedAt
    ): self
    {
        return new self(
            $id,
            $code,
            $name,
            $mainContact,
            $barcode,
            $state,
            $direction,
            $companyId,
            $itemState,
            $createdAt,
            $updatedAt
        );
    }

    public function id(): LocationId
    {
        return $this->id;
    }

    public function code(): LocationCode
    {
        return $this->code;
    }

    public function name(): LocationName
    {
        return $this->name;
    }

    public function mainContact(): LocationMainContact
    {
        return $this->mainContact;
    }

    public function barcode(): LocationBarcode
    {
        return $this->barcode;
    }

    public function state(): LocationState
    {
        return $this->state;
    }

    public function direction(): LocationDirection
    {
        return $this->direction;
    }

    public function companyId(): LocationCompanyId
    {
        return $this->companyId;
    }

    public function itemState(): LocationItemState
    {
        return $this->itemState;
    }

    public function createdAt(): DateTimeValueObject
    {
        return $this->createdAt;
    }

    public function updatedAt(): DateTimeValueObject
    {
        return $this->updatedAt;
    }

    public function changeCode(LocationCode $code)
    {
        if (false === ($this->code()->equals($code))) {
            $this->code = $code;
            $this->updatedAt = DateTimeValueObject::now();
        }
    }

    public function changeName(LocationName $name)
    {
        if (false === ($this->name()->equals($name))) {
            $this->name = $name;
            $this->updatedAt = DateTimeValueObject::now();
        }
    }

    public function changeMainContact(LocationMainContact $mainContact)
    {
        if (false === ($this->mainContact()->equals($mainContact))) {
            $this->mainContact = $mainContact;
            $this->updatedAt = DateTimeValueObject::now();
        }
    }

    public function changeBarcode(LocationBarcode $barcode)
    {
        if (false === ($this->barcode()->equals($barcode))) {
            $this->barcode = $barcode;
            $this->updatedAt = DateTimeValueObject::now();
        }
    }

    public function changeState(LocationState $state)
    {
        if (false === ($this->state()->equals($state))) {
            $this->state = $state;
            $this->updatedAt = DateTimeValueObject::now();
        }
    }

    public function changeDirection(LocationDirection $direction)
    {
        if (false === ($this->direction()->equals($direction))) {
            $this->direction = $direction;
            $this->updatedAt = DateTimeValueObject::now();
        }
    }

    public function changeCompanyId(LocationCompanyId $companyId)
    {
        if (false === ($this->companyId()->equals($companyId))) {
            $this->companyId = $companyId;
            $this->updatedAt = DateTimeValueObject::now();
        }
    }

    public function changeItemState(LocationItemState $itemState)
    {
        if (false === ($this->itemState()->equals($itemState))) {
            $this->itemState = $itemState;
            $this->updatedAt = DateTimeValueObject::now();
        }
    }
}
