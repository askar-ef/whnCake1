<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property int $id
 * @property int $transaction_id
 * @property \Cake\I18n\FrozenTime $payment_date
 * @property int $amount_paid
 * @property string $payment_method
 *
 * @property \App\Model\Entity\Transaction $transaction
 */
class Payment extends Entity
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
        'transaction_id' => true,
        'payment_date' => true,
        'amount_paid' => true,
        'payment_method' => true,
        'transaction' => true,
    ];
}
