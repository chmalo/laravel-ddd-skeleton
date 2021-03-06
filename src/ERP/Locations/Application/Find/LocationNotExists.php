<?php

declare(strict_types=1);

namespace Medine\ERP\Locations\Application\Find;

final class LocationNotExists extends \Exception
{

    public function __construct(string $id)
    {
        parent::__construct("The location with id {$id} doesn't exist");
    }
}
