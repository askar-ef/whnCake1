<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\PurchaseItem> $purchaseItems
 */
?>
<div class="purchaseItems index content">
    <?= $this->Html->link(__('New Purchase Item'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Purchase Items') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('purchase_id') ?></th>
                    <th><?= $this->Paginator->sort('motorcycle_id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($purchaseItems as $purchaseItem): ?>
                <tr>
                    <td><?= $this->Number->format($purchaseItem->id) ?></td>
                    <td><?= $purchaseItem->has('purchase') ? $this->Html->link($purchaseItem->purchase->id, ['controller' => 'Purchases', 'action' => 'view', $purchaseItem->purchase->id]) : '' ?></td>
                    <td><?= $purchaseItem->has('motorcycle') ? $this->Html->link($purchaseItem->motorcycle->model, ['controller' => 'Motorcycles', 'action' => 'view', $purchaseItem->motorcycle->id]) : '' ?></td>
                    <td><?= $this->Number->format($purchaseItem->quantity) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $purchaseItem->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchaseItem->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchaseItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseItem->id)]) ?>
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
