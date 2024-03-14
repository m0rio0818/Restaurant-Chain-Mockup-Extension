<?php

namespace Helpers;

use Models\Users\Employee;
use Faker\Factory;
use Models\Users;
use Models\Companies\RestaurantChains\RestaurantChain;
use Models\RestaurantLocations\RestaurantLocation;

class RandomGenerator
{
    public static function employee(): Employee
    {
        $faker = Factory::create();

        return new Employee(
            $faker->randomNumber(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->email,
            $faker->password,
            $faker->phoneNumber,
            $faker->address,
            $faker->dateTimeThisCentury,
            $faker->dateTimeBetween('-10 years', '+20 years'),
            $faker->randomElement(['admin', 'user', 'editor']),
            $faker->randomElement(["Chef", "Cashier", "Server", "Cooking Assistance"]),
            $faker->randomFloat(),
            $faker->dateTimeBetween('-10 years', 'now'),
            array($faker->randomElement(["Great!!", "Good!", "Not bad", "Same..", "NextTime..."])),
        );
    }


    public static function restaurantChain(): RestaurantChain
    {
        $faker = Factory::create();

        return new RestaurantChain(
            $faker->name(),
            $faker->year(),
            $faker->text(100),
            $faker->url(),
            $faker->phoneNumber(),
            $faker->randomElement(["IT", "Loyal", "Economic", "Consulting"]),
            $faker->name(),
            $faker->boolean(),
            $faker->country(),
            $faker->name(),
            $faker->randomNumber(),
            $faker->randomNumber(4, true),
            self::generateArray("location", 2, 10),
            $faker->randomElement(["Chiniese", "Japanese", "Korean", "Italian", "French", "English"]),
            $faker->randomNumber(),
            $faker->company(),
        );
    }


    public static function restaurantLocation(): RestaurantLocation
    {
        $faker = Factory::create();

        return new RestaurantLocation(
            $faker->streetAddress(),
            $faker->address(),
            $faker->city(),
            $faker->state(),
            $faker->postcode(),
            self::generateArray("employee", 2, 10),
            $faker->boolean(),
            $faker->boolean(),
            $faker->randomNumber()
        );
    }


    public static function generateArray(string $type, int $min = 2, int $max = 10): array
    {
        $faker = Factory::create();
        $arrays = [];
        $numOfArray = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfArray; $i++) {
            if ($type == "employee") $arrays[] = self::employee();
            elseif ($type == "location") $arrays[] = self::restaurantLocation();
            elseif ($type == "chain") $arrays[] = self::restaurantChain();
        }

        return $arrays;
    }
}
