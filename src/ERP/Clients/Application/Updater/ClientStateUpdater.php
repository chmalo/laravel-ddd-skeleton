<?php

declare(strict_types=1);


namespace Medine\ERP\Clients\Application\Updater;


use Medine\ERP\Clients\Domain\Contracts\ClientRepository;
use Medine\ERP\Clients\Domain\Service\ClientFinder;
use Medine\ERP\Clients\Domain\ValueObjects\ClientId;
use Medine\ERP\Clients\Domain\ValueObjects\ClientState;
use Medine\ERP\Shared\Domain\Bus\Event\EventBus;

final class ClientStateUpdater
{
    private $repository;
    private $bus;

    public function __construct(
        ClientRepository $repository,
        EventBus $bus
    )
    {
        $this->repository = $repository;
        $this->finder = new ClientFinder($repository);
        $this->bus = $bus;
    }

    public function __invoke(ClientStateUpdaterRequest $request)
    {
        $client = ($this->finder)(new ClientId(
           $request->id()
        ));

        $client->changeState(new ClientState($request->state()));

        $this->repository->update($client);
        $this->bus->publish(...$client->pullDomainEvents());
    }
}
