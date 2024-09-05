<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PurchaseItem Entity
 *
 * @property int $id
 * @property int $purchase_id
 * @property int $motorcycle_id
 * @property int $quantity
 *
 * @property \App\Model\Entity\Purchase $purchase
 * @property \App\Model\Entity\Motorcycle $motorcycle
 */
class PurchaseItem extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'purchase_id' => true,
        'motorcycle_id' => true,
        'quantity' => true,
        'purchase' => true,
        'motorcycle' => true,
    ];
}
