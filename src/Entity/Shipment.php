<?php
/**
 * @author    Matthieu Vion
 * @copyright 2018 Magentix
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/magentix/pickup-plugin
 */
declare(strict_types=1);

namespace Magentix\SyliusPickupPlugin\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Shipment as BaseShipment;

class Shipment extends BaseShipment
{
    /**
     * @var string $pickup_id|null
     *
     * @ORM\Column(name="pickup_id", type="string", nullable=true, length=255)
     */
    private ?string $pickup_id;

    /**
     * @return string|null
     */
    public function getPickupId(): ?string
    {
        return $this->pickup_id;
    }

    /**
     * @param string|null $pickupId
     */
    public function setPickupId(?string $pickupId): void
    {
        $this->pickup_id = $pickupId;
    }
}
