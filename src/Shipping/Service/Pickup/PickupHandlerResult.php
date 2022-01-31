<?php

declare(strict_types=1);

namespace Magentix\SyliusPickupPlugin\Shipping\Service\Pickup;

use Sylius\Component\Addressing\Model\CountryInterface;
use Sylius\Component\Core\Model\AddressInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\Intl\Countries;

final class PickupHandlerResult implements PickupHandlerResultInterface
{
    private RepositoryInterface $countryRepository;

    public function __construct(RepositoryInterface $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function handle(
        ?string $pickupCurrentId,
        array $pickupList,
        ?AddressInterface $currentAddress,
        int $index,
        ?string $method
    ): array {
        return [
            'pickup' => [
                'current_id' => $pickupCurrentId,
                'list' => $pickupList,
            ],
            'address' => $currentAddress,
            'countries' => $this->getAvailableCountries(),
            'index' => $index,
            'code' => $method,
        ];
    }

    /**
     * @return array|CountryInterface[]
     */
    private function getAvailableCountries(): array
    {
        $countries = Countries::getNames();

        /** @var CountryInterface[] $definedCountries */
        $definedCountries = $this->countryRepository->findAll();

        $availableCountries = [];

        foreach ($definedCountries as $country) {
            $availableCountries[$country->getCode()] = $countries[$country->getCode()];
        }

        return $availableCountries;
    }
}
