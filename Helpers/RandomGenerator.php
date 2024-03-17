<?php

namespace Helpers;

use Models\Users\Employee;
use Faker\Factory;
use Models\Users;
use Models\Companies\RestaurantChains\RestaurantChain;
use Models\RestaurantLocations\RestaurantLocation;
use Models\Users\User;


class RandomGenerator
{
    public static function user(): User
    {
        $faker = Factory::create();

        return new User(
            $faker->randomNumber(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->email,
            $faker->password,
            $faker->phoneNumber,
            $faker->address,
            $faker->dateTimeThisCentury,
            $faker->dateTimeBetween('-10 years', '+20 years'),
            $faker->randomElement(['admin', 'user', 'editor'])
        );
    }

    public static function employee(int $salary_min, int $salary_max): Employee
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
            $faker->randomFloat(1, $salary_min, $salary_max),
            $faker->dateTimeBetween('-10 years', 'now'),
            array($faker->randomElement(["Great!!", "Good!", "Not bad", "Same..", "NextTime..."])),
        );
    }

    public static function restaurantLocation(
        int $employees,
        int $salary_min,
        int $salary_max,
        string $postal_min,
        string $postal_max
    ): RestaurantLocation {
        $faker = Factory::create();

        return new RestaurantLocation(
            $faker->streetAddress(),
            $faker->address(),
            $faker->city(),
            $faker->state(),
            $faker->generatePostalCode($postal_min, $postal_max),
            self::employees($employees, $salary_min,  $salary_max),
            $faker->boolean(),
            $faker->boolean(),
            $faker->randomNumber()
        );
    }

    public static function restaurantChain(
        int $locations,
        int $employees,
        int $salary_min,
        int $salary_max,
        string $postal_min,
        string $postal_max
    ): RestaurantChain {
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
            $employees,
            $faker->randomNumber(4, true),
            self::restaurantLocations($locations, $employees, $salary_min, $salary_max, $postal_min, $postal_max),
            $faker->randomElement(["Chiniese", "Japanese", "Korean", "Italian", "French", "English"]),
            $locations,
            $faker->company(),
        );
    }

    public static function generatePostalCode(string $postal_min, string $postal_max): string
    {
        $pos_min_head = (int) substr($postal_min, 0, 3);
        $pos_min_tail = (int) substr($postal_min, 4, 7);
        $pos_max_head = (int) substr($postal_max, 0, 3);
        $pos_max_tail = (int) substr($postal_max, 4, 7);

        $pos_min = $pos_min_head * 10000 + $pos_min_tail;
        $pos_min = $pos_max_head * 10000 + $pos_max_tail;

        $faker = Factory::create();

        $postCode = (string)$faker->numberBetween($pos_min, $pos_min);
        echo "最終的なpostcode" . $postCode . PHP_EOL;

        return substr($postCode, 0, 3) . "-" . substr($postCode, 4, 7);
    }


    public static function employees(
        int $employees,
        int $salary_min,
        int $salary_max,
    ): array {
        $arrays = [];
        for ($i = 0; $i < $employees; $i++) {
            $arrays[] = self::employee($salary_min, $salary_max);
        }

        return $arrays;
    }


    public static function restaurantLocations(
        int $locations,
        int $employees,
        int $salary_min,
        int $salary_max,
        string $postal_min,
        string $postal_max
    ): array {
        $arrays = [];
        for ($i = 0; $i < $locations; $i++) {
            $arrays[] = self::restaurantLocation(
                $employees,
                $salary_min,
                $salary_max,
                $postal_min,
                $postal_max
            );
        }

        return $arrays;
    }

    public static function restaurantChains(
        int $locations,
        int $employees,
        int $salary_min,
        int $salary_max,
        string $postal_min,
        string $postal_max
    ): array {
        $arrays = [];
        for ($i = 0; $i < $locations; $i++) {
            $arrays[] = self::restaurantChain(
                $locations,
                $employees,
                $salary_min,
                $salary_max,
                $postal_min,
                $postal_max
            );
        }

        return $arrays;
    }
}
