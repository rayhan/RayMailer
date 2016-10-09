<?php
namespace RayMailer\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use RayMailer\Model\Table\LayoutsTable;

/**
 * RayMailer\Model\Table\LayoutsTable Test Case
 */
class LayoutsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \RayMailer\Model\Table\LayoutsTable
     */
    public $Layouts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.ray_mailer.layouts',
        'plugin.ray_mailer.raymailer_templates'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Layouts') ? [] : ['className' => 'RayMailer\Model\Table\LayoutsTable'];
        $this->Layouts = TableRegistry::get('Layouts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Layouts);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
