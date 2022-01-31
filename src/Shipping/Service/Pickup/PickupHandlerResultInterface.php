<?php

declare(strict_types=1);

namespace Magentix\SyliusPickupPlugin\Shipping\Service\Pickup;

use Sylius\Component\Core\Model\AddressInterface;

interface PickupHandlerResultInterface
{
    public function handle(
        ?string $pickupCurrentId,
        array $pickupList,
        ?AddressInterface $currentAddress,
        int $index,
        ?string $method
    ): array;
}