<?php

use App\Models\Tutor;
use App\Repositories\TutorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TutorRepositoryTest extends TestCase
{
    use MakeTutorTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TutorRepository
     */
    protected $tutorRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tutorRepo = App::make(TutorRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTutor()
    {
        $tutor = $this->fakeTutorData();
        $createdTutor = $this->tutorRepo->create($tutor);
        $createdTutor = $createdTutor->toArray();
        $this->assertArrayHasKey('id', $createdTutor);
        $this->assertNotNull($createdTutor['id'], 'Created Tutor must have id specified');
        $this->assertNotNull(Tutor::find($createdTutor['id']), 'Tutor with given id must be in DB');
        $this->assertModelData($tutor, $createdTutor);
    }

    /**
     * @test read
     */
    public function testReadTutor()
    {
        $tutor = $this->makeTutor();
        $dbTutor = $this->tutorRepo->find($tutor->id);
        $dbTutor = $dbTutor->toArray();
        $this->assertModelData($tutor->toArray(), $dbTutor);
    }

    /**
     * @test update
     */
    public function testUpdateTutor()
    {
        $tutor = $this->makeTutor();
        $fakeTutor = $this->fakeTutorData();
        $updatedTutor = $this->tutorRepo->update($fakeTutor, $tutor->id);
        $this->assertModelData($fakeTutor, $updatedTutor->toArray());
        $dbTutor = $this->tutorRepo->find($tutor->id);
        $this->assertModelData($fakeTutor, $dbTutor->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTutor()
    {
        $tutor = $this->makeTutor();
        $resp = $this->tutorRepo->delete($tutor->id);
        $this->assertTrue($resp);
        $this->assertNull(Tutor::find($tutor->id), 'Tutor should not exist in DB');
    }
}
