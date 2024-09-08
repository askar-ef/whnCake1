<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Purchase $purchase
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Purchase'), ['action' => 'edit', $purchase->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Purchase'), ['action' => 'delete', $purchase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchase->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Purchases'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Purchase'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchases view content">
            <h3><?= h($purchase->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Supplier') ?></th>
                    <td><?= $purchase->has('supplier') ? $this->Html->link($purchase->supplier->name, ['controller' => 'Suppliers', 'action' => 'view', $purchase->supplier->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($purchase->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Amount') ?></th>
                    <td><?= $this->Number->format($purchase->total_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Purchase Date') ?></th>
                    <td><?= h($purchase->purchase_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Purchase Items') ?></h4>
                <?php if (!empty($purchase->purchase_items)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Purchase Id') ?></th>
                                <th><?= __('Motorcycle Id') ?></th>
                                <th><?= __('Quantity') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($purchase->purchase_items as $purchaseItems) : ?>
                                <tr>
                                    <td><?= h($purchaseItems->id) ?></td>
                                    <td><?= h($purchaseItems->purchase_id) ?></td>
                                    <td><?= h($purchaseItems->motorcycle_id) ?></td>
                                    <td><?= h($purchaseItems->quantity) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'PurchaseItems', 'action' => 'view', $purchaseItems->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'PurchaseItems', 'action' => 'edit', $purchaseItems->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchaseItems', 'action' => 'delete', $purchaseItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseItems->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>