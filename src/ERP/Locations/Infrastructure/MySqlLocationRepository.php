<?php

declare(strict_types=1);

namespace Medine\ERP\Locations\Infrastructure;

use Illuminate\Support\Facades\DB;
use Medine\ERP\Locations\Domain\Entity\Location;
use Medine\ERP\Locations\Domain\LocationRepository;
use Medine\ERP\Locations\Domain\ValueObject\LocationBarcode;
use Medine\ERP\Locations\Domain\ValueObject\LocationCode;
use Medine\ERP\Locations\Domain\ValueObject\LocationCompanyId;
use Medine\ERP\Locations\Domain\ValueObject\LocationCreatedAt;
use Medine\ERP\Locations\Domain\ValueObject\LocationDirection;
use Medine\ERP\Locations\Domain\ValueObject\LocationId;
use Medine\ERP\Locations\Domain\ValueObject\LocationItemState;
use Medine\ERP\Locations\Domain\ValueObject\LocationMainContact;
use Medine\ERP\Locations\Domain\ValueObject\LocationName;
use Medine\ERP\Locations\Domain\ValueObject\LocationState;
use Medine\ERP\Locations\Domain\ValueObject\LocationUpdatedAt;
use Medine\ERP\Shared\Infrastructure\MySqlRepository;

final class MySqlLocationRepository extends MySqlRepository implements LocationRepository
{

    public function save(Location $location): void
    {
        DB::table('location')->insert([
            'id' => $location->id()->value(),
            'code' => $location->code()->value(),
            'name' => $location->name()->value(),
            'main_contact' => $location->mainContact()->value(),
            'barcode' => $location->barcode()->value(),
            'state' => $location->state()->value(),
            'direction' => $location->direction()->value(),
            'company_id' => $location->companyId()->value(),
            'item_State' => $location->itemState()->value(),
            'created_at' => $location->createdAt()->value(),
            'updated_at' => $location->updatedAt()->value(),
        ]);
    }

    public function update(Location $location): void
    {
        DB::table('location')->where('location.id', $location->id()->value())->take(1)->update([
            'code' => $location->code()->value(),
            'name' => $location->name()->value(),
            'main_contact' => $location->mainContact()->value(),
            'barcode' => $location->barcode()->value(),
            'state' => $location->state()->value(),
            'direction' => $location->direction()->value(),
            'company_id' => $location->companyId()->value(),
            'item_State' => $location->itemState()->value(),
            'updated_at' => $location->updatedAt()->value(),
        ]);
    }

    public function find(LocationId $id): ?Location
    {
        $row = DB::table('location')->where('location.id', $id->value())->first();

        return !empty($row) ? Location::fromDatabase(
            new LocationId($row->id),
            new LocationCode($row->code),
            new LocationName($row->name),
            new LocationMainContact($row->main_contact),
            new LocationBarcode($row->barcode),
            new LocationState($row->state),
            new LocationDirection($row->direction),
            new LocationCompanyId($row->company_id),
            new LocationItemState($row->item_State),
            new LocationCreatedAt($row->created_at),
            new LocationUpdatedAt($row->updated_at)
        ) : null;
    }
}
