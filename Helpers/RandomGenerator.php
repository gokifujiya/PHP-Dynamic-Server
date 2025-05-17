<?php
namespace Helpers;

use Faker\Factory;
use Models\User;

class RandomGenerator {
    public static function users(int $min, int $max): array {
        $faker = Factory::create();
        $users = [];

        $count = $faker->numberBetween($min, $max);
        for ($i = 1; $i <= $count; $i++) {
            $users[] = new User(
                $i,
                $faker->firstName,
                $faker->lastName,
                $faker->email,
                $faker->password,
                $faker->phoneNumber,
                $faker->address,
                new \DateTime($faker->date),
                new \DateTime($faker->dateTimeBetween('+1 year', '+2 years')->format('Y-m-d')),
                $faker->randomElement(['admin', 'editor', 'user'])
            );
        }

        return $users;
    }
}
