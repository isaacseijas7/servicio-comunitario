<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TutorApiTest extends TestCase
{
    use MakeTutorTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTutor()
    {
        $tutor = $this->fakeTutorData();
        $this->json('POST', '/api/v1/tutors', $tutor);

        $this->assertApiResponse($tutor);
    }

    /**
     * @test
     */
    public function testReadTutor()
    {
        $tutor = $this->makeTutor();
        $this->json('GET', '/api/v1/tutors/'.$tutor->id);

        $this->assertApiResponse($tutor->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTutor()
    {
        $tutor = $this->makeTutor();
        $editedTutor = $this->fakeTutorData();

        $this->json('PUT', '/api/v1/tutors/'.$tutor->id, $editedTutor);

        $this->assertApiResponse($editedTutor);
    }

    /**
     * @test
     */
    public function testDeleteTutor()
    {
        $tutor = $this->makeTutor();
        $this->json('DELETE', '/api/v1/tutors/'.$tutor->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tutors/'.$tutor->id);

        $this->assertResponseStatus(404);
    }
}
