<?php

use Faker\Factory as Faker;
use App\Models\Inscription;
use App\Repositories\InscriptionRepository;

trait MakeInscriptionTrait
{
    /**
     * Create fake instance of Inscription and save it in database
     *
     * @param array $inscriptionFields
     * @return Inscription
     */
    public function makeInscription($inscriptionFields = [])
    {
        /** @var InscriptionRepository $inscriptionRepo */
        $inscriptionRepo = App::make(InscriptionRepository::class);
        $theme = $this->fakeInscriptionData($inscriptionFields);
        return $inscriptionRepo->create($theme);
    }

    /**
     * Get fake instance of Inscription
     *
     * @param array $inscriptionFields
     * @return Inscription
     */
    public function fakeInscription($inscriptionFields = [])
    {
        return new Inscription($this->fakeInscriptionData($inscriptionFields));
    }

    /**
     * Get fake data of Inscription
     *
     * @param array $postFields
     * @return array
     */
    public function fakeInscriptionData($inscriptionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'status' => $fake->word,
            'student_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $inscriptionFields);
    }
}
