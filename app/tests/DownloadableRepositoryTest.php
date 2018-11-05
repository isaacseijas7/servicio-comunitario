<?php

use App\Models\Downloadable;
use App\Repositories\DownloadableRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DownloadableRepositoryTest extends TestCase
{
    use MakeDownloadableTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DownloadableRepository
     */
    protected $downloadableRepo;

    public function setUp()
    {
        parent::setUp();
        $this->downloadableRepo = App::make(DownloadableRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDownloadable()
    {
        $downloadable = $this->fakeDownloadableData();
        $createdDownloadable = $this->downloadableRepo->create($downloadable);
        $createdDownloadable = $createdDownloadable->toArray();
        $this->assertArrayHasKey('id', $createdDownloadable);
        $this->assertNotNull($createdDownloadable['id'], 'Created Downloadable must have id specified');
        $this->assertNotNull(Downloadable::find($createdDownloadable['id']), 'Downloadable with given id must be in DB');
        $this->assertModelData($downloadable, $createdDownloadable);
    }

    /**
     * @test read
     */
    public function testReadDownloadable()
    {
        $downloadable = $this->makeDownloadable();
        $dbDownloadable = $this->downloadableRepo->find($downloadable->id);
        $dbDownloadable = $dbDownloadable->toArray();
        $this->assertModelData($downloadable->toArray(), $dbDownloadable);
    }

    /**
     * @test update
     */
    public function testUpdateDownloadable()
    {
        $downloadable = $this->makeDownloadable();
        $fakeDownloadable = $this->fakeDownloadableData();
        $updatedDownloadable = $this->downloadableRepo->update($fakeDownloadable, $downloadable->id);
        $this->assertModelData($fakeDownloadable, $updatedDownloadable->toArray());
        $dbDownloadable = $this->downloadableRepo->find($downloadable->id);
        $this->assertModelData($fakeDownloadable, $dbDownloadable->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDownloadable()
    {
        $downloadable = $this->makeDownloadable();
        $resp = $this->downloadableRepo->delete($downloadable->id);
        $this->assertTrue($resp);
        $this->assertNull(Downloadable::find($downloadable->id), 'Downloadable should not exist in DB');
    }
}
