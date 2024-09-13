<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\CustomHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\CustomHelper Test Case
 */
class CustomHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\View\Helper\CustomHelper
     */
    protected $CustomHelper;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->CustomHelper = new CustomHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CustomHelper);

        parent::tearDown();
    }
}
