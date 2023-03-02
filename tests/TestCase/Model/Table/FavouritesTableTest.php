<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FavouritesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FavouritesTable Test Case
 */
class FavouritesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FavouritesTable
     */
    protected $Favourites;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Favourites',
        'app.Bookmarks',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Favourites') ? [] : ['className' => FavouritesTable::class];
        $this->Favourites = $this->getTableLocator()->get('Favourites', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Favourites);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FavouritesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FavouritesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
