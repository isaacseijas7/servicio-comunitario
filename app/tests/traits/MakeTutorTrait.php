<?php

use Faker\Factory as Faker;
use App\Models\Tutor;
use App\Repositories\TutorRepository;

trait MakeTutorTrait
{
    /**
     * Create fake instance of Tutor and save it in database
     *
     * @param array $tutorFields
     * @return Tutor
     */
    public function makeTutor($tutorFields = [])
    {
        /** @var TutorRepository $tutorRepo */
        $tutorRepo = App::make(TutorRepository::class);
        $theme = $this->fakeTutorData($tutorFields);
        return $tutorRepo->create($theme);
    }

    /**
     * Get fake instance of Tutor
     *
     * @param array $tutorFields
     * @return Tutor
     */
    public function fakeTutor($tutorFields = [])
    {
        return new Tutor($this->fakeTutorData($tutorFields));
    }

    /**
     * Get fake data of Tutor
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTutorData($tutorFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'type' => $fake->word,
            'user_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $tutorFields);
    }
}
