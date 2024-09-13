<?php

declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Matauang helper
 */
class MatauangHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [];

    public function formatRupiah($number)
    {
        return 'Rp ' . number_format($number, 0, ',', '.');
    }
}
