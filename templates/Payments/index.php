<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Payment> $payments
 */
?>
<div class="payments index content">
    <?= $this->Html->link(__('New Payment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Payments') ?></h3>

    <!-- Filter Form -->
    <div class="filter">
        <h4><?= __('Filter Payments by Date') ?></h4>
        <?= $this->Form->create(null, ['type' => 'get']) ?>
        <?= $this->Form->control('start_date', ['type' => 'date', 'label' => 'Start Date']) ?>
        <?= $this->Form->control('end_date', ['type' => 'date', 'label' => 'End Date']) ?>
        <?= $this->Form->button('Filter') ?>
        <?= $this->Form->end() ?>
    </div>

    <!-- Flash messages -->
    <?= $this->Flash->render() ?>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('transaction_id') ?></th>
                    <th><?= $this->Paginator->sort('payment_date') ?></th>
                    <th><?= $this->Paginator->sort('amount_paid') ?></th>
                    <th><?= $this->Paginator->sort('payment_method') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $payment): ?>
                    <tr>
                        <td><?= $this->Number->format($payment->id) ?></td>
                        <td>
                            <?= $payment->has('transaction') ? $this->Html->link($payment->transaction->id, ['controller' => 'Transactions', 'action' => 'view', $payment->transaction->id]) : '' ?>
                        </td>
                        <td><?= h($payment->payment_date->format('Y-m-d')) ?></td>
                        <td><?= $this->Number->format($payment->amount_paid) ?></td>
                        <td><?= h($payment->payment_method) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $payment->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $payment->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>