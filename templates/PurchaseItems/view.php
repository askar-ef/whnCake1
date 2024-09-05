<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseItem $purchaseItem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Purchase Item'), ['action' => 'edit', $purchaseItem->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Purchase Item'), ['action' => 'delete', $purchaseItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseItem->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Purchase Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Purchase Item'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchaseItems view content">
            <h3><?= h($purchaseItem->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Purchase') ?></th>
                    <td><?= $purchaseItem->has('purchase') ? $this->Html->link($purchaseItem->purchase->id, ['controller' => 'Purchases', 'action' => 'view', $purchaseItem->purchase->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Motorcycle') ?></th>
                    <td><?= $purchaseItem->has('motorcycle') ? $this->Html->link($purchaseItem->motorcycle->model, ['controller' => 'Motorcycles', 'action' => 'view', $purchaseItem->motorcycle->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($purchaseItem->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($purchaseItem->quantity) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
