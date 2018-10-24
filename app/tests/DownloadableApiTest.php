<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DownloadableApiTest extends TestCase
{
    use MakeDownloadableTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDownloadable()
    {
        $downloadable = $this->fakeDownloadableData();
        $this->json('POST', '/api/v1/downloadables', $downloadable);

        $this->assertApiResponse($downloadable);
    }

    /**
     * @test
     */
    public function testReadDownloadable()
    {
        $downloadable = $this->makeDownloadable();
        $this->json('GET', '/api/v1/downloadables/'.$downloadable->id);

        $this->assertApiResponse($downloadable->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDownloadable()
    {
        $downloadable = $this->makeDownloadable();
        $editedDownloadable = $this->fakeDownloadableData();

        $this->json('PUT', '/api/v1/downloadables/'.$downloadable->id, $editedDownloadable);

        $this->assertApiResponse($editedDownloadable);
    }

    /**
     * @test
     */
    public function testDeleteDownloadable()
    {
        $downloadable = $this->makeDownloadable();
        $this->json('DELETE', '/api/v1/downloadables/'.$downloadable->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/downloadables/'.$downloadable->id);

        $this->assertResponseStatus(404);
    }
}
