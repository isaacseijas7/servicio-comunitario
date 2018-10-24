<?php

use App\Models\Inscription;
use App\Repositories\InscriptionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InscriptionRepositoryTest extends TestCase
{
    use MakeInscriptionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var InscriptionRepository
     */
    protected $inscriptionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->inscriptionRepo = App::make(InscriptionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateInscription()
    {
        $inscription = $this->fakeInscriptionData();
        $createdInscription = $this->inscriptionRepo->create($inscription);
        $createdInscription = $createdInscription->toArray();
        $this->assertArrayHasKey('id', $createdInscription);
        $this->assertNotNull($createdInscription['id'], 'Created Inscription must have id specified');
        $this->assertNotNull(Inscription::find($createdInscription['id']), 'Inscription with given id must be in DB');
        $this->assertModelData($inscription, $createdInscription);
    }

    /**
     * @test read
     */
    public function testReadInscription()
    {
        $inscription = $this->makeInscription();
        $dbInscription = $this->inscriptionRepo->find($inscription->id);
        $dbInscription = $dbInscription->toArray();
        $this->assertModelData($inscription->toArray(), $dbInscription);
    }

    /**
     * @test update
     */
    public function testUpdateInscription()
    {
        $inscription = $this->makeInscription();
        $fakeInscription = $this->fakeInscriptionData();
        $updatedInscription = $this->inscriptionRepo->update($fakeInscription, $inscription->id);
        $this->assertModelData($fakeInscription, $updatedInscription->toArray());
        $dbInscription = $this->inscriptionRepo->find($inscription->id);
        $this->assertModelData($fakeInscription, $dbInscription->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteInscription()
    {
        $inscription = $this->makeInscription();
        $resp = $this->inscriptionRepo->delete($inscription->id);
        $this->assertTrue($resp);
        $this->assertNull(Inscription::find($inscription->id), 'Inscription should not exist in DB');
    }
}
