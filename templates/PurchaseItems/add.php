<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseItem $purchaseItem
 * @var \Cake\Collection\CollectionInterface|string[] $purchases
 * @var \Cake\Collection\CollectionInterface|string[] $motorcycles
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Purchase Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchaseItems form content">
            <?= $this->Form->create($purchaseItem) ?>
            <fieldset>
                <legend><?= __('Add Purchase Item') ?></legend>
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
