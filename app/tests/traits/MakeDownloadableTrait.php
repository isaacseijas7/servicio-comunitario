<?php

use Faker\Factory as Faker;
use App\Models\Downloadable;
use App\Repositories\DownloadableRepository;

trait MakeDownloadableTrait
{
    /**
     * Create fake instance of Downloadable and save it in database
     *
     * @param array $downloadableFields
     * @return Downloadable
     */
    public function makeDownloadable($downloadableFields = [])
    {
        /** @var DownloadableRepository $downloadableRepo */
        $downloadableRepo = App::make(DownloadableRepository::class);
        $theme = $this->fakeDownloadableData($downloadableFields);
        return $downloadableRepo->create($theme);
    }

    /**
     * Get fake instance of Downloadable
     *
     * @param array $downloadableFields
     * @return Downloadable
     */
    public function fakeDownloadable($downloadableFields = [])
    {
        return new Downloadable($this->fakeDownloadableData($downloadableFields));
    }

    /**
     * Get fake data of Downloadable
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDownloadableData($downloadableFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'archive' => $fake->word,
            'status' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $downloadableFields);
    }
}
