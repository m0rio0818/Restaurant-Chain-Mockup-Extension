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
        $ans = [];
        $i = 1;
        foreach ($restaurantChains as $chain) {
            $ans["restrauntChain" . $i] = $chain->toArray();
            $locations = $chain->getRestaurantLocations();
            foreach ($locations as $locaition) {
                $ans["restrauntChain" . $i]["restrauntLocations"] = $locaition->toArray();
                $employees = $locaition->getEmployees();
                foreach ($employees as $employee) {
                    $ans["restrauntChain" . $i]["restrauntLocations"]["employee"][] = $employee->toArray();
                }
            }
            $i++;
        }
        echo json_encode($ans, JSON_PRETTY_PRINT);
        // $chainArray = array_map(fn ($chain) => $chain->toArray(), $restaurantChains);
        // echo json_encode($chainArray, JSON_PRETTY_PRINT);
    }

    public static function generateText(array $restaurantChains): void
    {
    }
}
