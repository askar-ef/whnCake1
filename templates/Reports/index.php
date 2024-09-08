<?php

/**
 * @var \App\View\AppView $this
 */
?>
<div class="reports index content">
    <h3><?= __('Purchase Report') ?></h3>

    <!-- Filter Form -->
    <div class="filter">
        <h4><?= __('Filter Reports by Date') ?></h4>
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
                    <th><?= __('No') ?></th>
                    <th><?= __('Customer Name') ?></th>
                    <th><?= __('Model') ?></th>
                    <th><?= __('Amount') ?></th>
                    <th><?= __('Date') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $counter = 1;
                foreach ($transactions as $transaction): ?>
                    <tr>
                        <td><?= h($counter) ?></td>
                        <td><?= h($transaction->customer->name) ?></td>
                        <td><?= h($transaction->motorcycle->model) ?></td>
                        <td><?= h($transaction->amount) ?></td>
                        <td><?= h($transaction->transaction_date->format('Y-m-d')) ?></td>
                    </tr>
                    <?php $counter++;
                    ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>