<?php

namespace Helpers;

use Models\Companies\RestaurantChains\RestaurantChain;

class GenerateFiles
{
    public static function generateMarkDown(array $restaurantChains): void
    {
        foreach ($restaurantChains as $chain) {
            echo $chain->toMarkDown();
            $locations = $chain->getRestaurantLocations();
            foreach ($locations as $locaition) {
                echo $locaition->toMarkDown();
                $employees = $locaition->getEmployees();
                echo "  #### Employees (num: "  . count($employees) .  ")\n";
                foreach ($employees as $employee) {
                    echo $employee->toMarkDown();
                }
            }
        }
    }

    public static function generateJson(array $restaurantChains): void
    {
    }

    public static function generateText(array $restaurantChains): void
    {
    }
}
