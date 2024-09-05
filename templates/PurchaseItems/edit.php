<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseItem $purchaseItem
 * @var string[]|\Cake\Collection\CollectionInterface $purchases
 * @var string[]|\Cake\Collection\CollectionInterface $motorcycles
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $purchaseItem->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseItem->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Purchase Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchaseItems form content">
            <?= $this->Form->create($purchaseItem) ?>
            <fieldset>
                <legend><?= __('Edit Purchase Item') ?></legend>
                <?php
                    echo $this->Form->control('purchase_id', ['options' => $purchases]);
                    echo $this->Form->control('motorcycle_id', ['options' => $motorcycles]);
                    echo $this->Form->control('quantity');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
