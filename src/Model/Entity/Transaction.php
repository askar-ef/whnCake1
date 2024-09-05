<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property int $motorcycle_id
 * @property \Cake\I18n\FrozenTime $transaction_date
 * @property int $amount
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Motorcycle $motorcycle
 * @property \App\Model\Entity\Payment[] $payments
 */
class Transaction extends Entity
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
        'customer_id' => true,
        'motorcycle_id' => true,
        'transaction_date' => true,
        'amount' => true,
        'customer' => true,
        'motorcycle' => true,
        'payments' => true,
    ];
}
