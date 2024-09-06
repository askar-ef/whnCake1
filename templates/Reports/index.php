<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Purchase> $purchases
 */
?>
<div class="reports index content">
    <h3><?= __('Laporan Pembelian') ?></h3>

    <!-- Filter Form -->
    <?= $this->Form->create(null, ['type' => 'get']) ?>
        <?= $this->Form->control('start_date', ['type' => 'date', 'label' => 'Tanggal Mulai']) ?>
        <?= $this->Form->control('end_date', ['type' => 'date', 'label' => 'Tanggal Akhir']) ?>
        <?= $this->Form->button('Filter') ?>
    <?= $this->Form->end() ?>

    <!-- Tampilkan rentang waktu jika ada filter -->
    <?php if (!empty($startDate) && !empty($endDate)): ?>
        <p>Menampilkan data dari <?= h($startDate) ?> hingga <?= h($endDate) ?></p>
    <?php endif; ?>

    <!-- Data Transaksi -->
    <table>
        <thead>
            <tr>
                <th><?= __('Nama Customer') ?></th>
                <th><?= __('Motor') ?></th>
                <th><?= __('Jumlah') ?></th>
                <th><?= __('Tanggal Transaksi') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $transaction): ?>
                <tr>
                    <td><?= h($transaction->customer->name) ?></td>
                    <td><?= h($transaction->motorcycle->model) ?></td>
                    <td><?= h($transaction->amount) ?></td>
                    <td><?= h($transaction->transaction_date->format('Y-m-d')) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

