<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Motorcycle Entity
 *
 * @property int $id
 * @property string $model
 * @property int $year
 * @property int $price
 * @property int $stock
 *
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class Motorcycle extends Entity
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
        'model' => true,
        'year' => true,
        'price' => true,
        'stock' => true,
        'transactions' => true,
    ];
}
