<?php

declare(strict_types=1);

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\MatauangHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\MatauangHelper Test Case
 */
class MatauangHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\View\Helper\MatauangHelper
     */
    protected $Matauang;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->Matauang = new MatauangHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Matauang);

        parent::tearDown();
    }
}
