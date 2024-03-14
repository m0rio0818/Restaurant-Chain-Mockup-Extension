<?php

namespace Models\Companies\RestaurantChains;

use Interfaces\FileConvertible;
use Models\Companies\Company;

class RestaurantChain extends Company implements FileConvertible
{
    private int $chainId;
    private array $restaurantLocations;
    private string $cuisineType;
    private int $numberOfLocations;
    private string $parentCompany;


    public function __construct(
        string $name,
        int $foundingYear,
        string $description,
        string $website,
        string $phone,
        string $industry,
        string $ceo,
        bool $isPubliclyTraded,
        string $country,
        string $founder,
        int $totalEmployees,
        int $chainId,
        array $restaurantLocations,
        string $cuisineType,
        int $numberOfLocations,
        string $parentCompany
    ) {
        parent::__construct(
            $name,
            $foundingYear,
            $description,
            $website,
            $phone,
            $industry,
            $ceo,
            $isPubliclyTraded,
            $country,
            $founder,
            $totalEmployees
        );
        $this->chainId = $chainId;
        $this->restaurantLocations = $restaurantLocations;
        $this->cuisineType = $cuisineType;
        $this->numberOfLocations = $numberOfLocations;
        $this->parentCompany = $parentCompany;
    }

    public function toString(): string
    {
        return sprintf(
            "
            Name: %s\n
            Founding Year: %d\n
            Description: %s\n
            Website: %s\n
            Phone: %s\n
            Industry: %s\n
            CEO: %s\nCountry: %s\n
            Founder: %s\n
            TotalEmployees Num: %d\n
            ",
            $this->getName(),
            $this->getFoundingYear(),
            $this->getDescription(),
            $this->getWebsite(),
            $this->getPhone(),
            $this->getIndustry(),
            $this->getCeo(),
            $this->getCountry(),
            $this->getFounder(),
            $this->getTotalEmployee(),
        );
    }
    public function toHTML(): string
    {
        $locationsLists = "";
        foreach ($this->restaurantLocations as $location) {
            $locationsLists .=  $location->toHTML();
        }



        return sprintf(
            "
            <div class='card p-3 my-3'>
                <h3 class='text-center py-3'>Restaurant Chain : %s</h3>
                %s
            </div>
            ",
            $this->getName(),
            $locationsLists,
        );
    }

    public function toMarkDown(): string
    {
        return "## User : {$this->getName()}
        -Found Year : {$this->getFoundingYear()}
        -Description : {$this->getDescription()}
        -WebSite : {$this->getWebsite()}
        -Phone : {$this->getPhone()}
        -Industry: {$this->getIndustry()}
        -CEO : {$this->getCeo()}
        -Country: {$this->getCountry()}
        -Founder : {$this->getFounder()}
        -Total Num : {$this->getTotalEmployee()}
        ";
    }

    public function toArray(): array
    {
        return [
            "name" => $this->getName(),
            "foundYear" => $this->getFoundingYear(),
            "description" => $this->getDescription(),
            "website" => $this->getWebsite(),
            "phone" => $this->getPhone(),
            "industry" => $this->getIndustry(),
            "ceo" => $this->getCeo(),
            "country" => $this->getCountry(),
            "founder" => $this->getFounder(),
            "totalemployees" => $this->getTotalEmployee(),
        ];
    }
}
