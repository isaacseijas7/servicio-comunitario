<?php

use Faker\Factory as Faker;
use App\Models\Configuration;
use App\Repositories\ConfigurationRepository;

trait MakeConfigurationTrait
{
    /**
     * Create fake instance of Configuration and save it in database
     *
     * @param array $configurationFields
     * @return Configuration
     */
    public function makeConfiguration($configurationFields = [])
    {
        /** @var ConfigurationRepository $configurationRepo */
        $configurationRepo = App::make(ConfigurationRepository::class);
        $theme = $this->fakeConfigurationData($configurationFields);
        return $configurationRepo->create($theme);
    }

    /**
     * Get fake instance of Configuration
     *
     * @param array $configurationFields
     * @return Configuration
     */
    public function fakeConfiguration($configurationFields = [])
    {
        return new Configuration($this->fakeConfigurationData($configurationFields));
    }

    /**
     * Get fake data of Configuration
     *
     * @param array $postFields
     * @return array
     */
    public function fakeConfigurationData($configurationFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'academic_period' => $fake->word,
            'min_credit_units' => $fake->word,
            'min_hour_community_service' => $fake->word,
            'min_hour_weeks' => $fake->word,
            'registration_date' => $fake->word,
            'registration_final_date' => $fake->word,
            'date_int_community_service' => $fake->word,
            'date_fin_community_service' => $fake->word,
            'coordinator_full_name' => $fake->word,
            'coordinator_identification' => $fake->word,
            'status' => $fake->randomElement(['deactivated']),
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $configurationFields);
    }
}
