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

    public function getRestaurantLocations(): array
    {
        return $this->restaurantLocations;
    }

    public function toString(): string
    {
        return sprintf(
            "<< Restraunt Chains Informations >> \n" .
                " - Restraunt Chains: %s\n" .
                " - Founding Year: %d\n" .
                " - Description: %s\n" .
                " - Website: %s\n" .
                " - Phone: %s\n" .
                " - Industry: %s\n" .
                " - CEO: %s\n" .
                " - Country: %s\n",
            $this->getName(),
            $this->getFoundingYear(),
            $this->getDescription(),
            $this->getWebsite(),
            $this->getPhone(),
            $this->getIndustry(),
            $this->getCeo(),
            $this->getCountry(),
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
        return "# Restraunt Chains : {$this->getName()}\n" .
            "## Restraunt Chains Informations \n" .
            "- Found Year : {$this->getFoundingYear()}\n" .
            "- WebSite : {$this->getWebsite()}\n" .
            "- Phone : {$this->getPhone()}\n" .
            "- Industry: {$this->getIndustry()}\n" .
            "- CEO : {$this->getCeo()}\n" .
            "- Country: {$this->getCountry()}\n" .
            "### Total Nums of Locations : {$this->numberOfLocations}\n";
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
        ];
    }
}
