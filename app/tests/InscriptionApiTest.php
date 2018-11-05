<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InscriptionApiTest extends TestCase
{
    use MakeInscriptionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateInscription()
    {
        $inscription = $this->fakeInscriptionData();
        $this->json('POST', '/api/v1/inscriptions', $inscription);

        $this->assertApiResponse($inscription);
    }

    /**
     * @test
     */
    public function testReadInscription()
    {
        $inscription = $this->makeInscription();
        $this->json('GET', '/api/v1/inscriptions/'.$inscription->id);

        $this->assertApiResponse($inscription->toArray());
    }

    /**
     * @test
     */
    public function testUpdateInscription()
    {
        $inscription = $this->makeInscription();
        $editedInscription = $this->fakeInscriptionData();

        $this->json('PUT', '/api/v1/inscriptions/'.$inscription->id, $editedInscription);

        $this->assertApiResponse($editedInscription);
    }

    /**
     * @test
     */
    public function testDeleteInscription()
    {
        $inscription = $this->makeInscription();
        $this->json('DELETE', '/api/v1/inscriptions/'.$inscription->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/inscriptions/'.$inscription->id);

        $this->assertResponseStatus(404);
    }
}
