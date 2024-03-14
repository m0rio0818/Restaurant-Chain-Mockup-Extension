<?php

namespace Models\Companies;

use Interfaces\FileConvertible;

class Company implements FileConvertible
{
    private string $name;
    private int $foundingYear;
    private string $description;
    private string $website;
    private string $phone;
    private string $industry;
    private string $ceo;
    private bool $isPubliclyTraded;
    private string $country;
    private string $founder;
    private int $totalEmployees;

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
        int $totalEmployees
    ) {
        $this->name = $name;
        $this->foundingYear = $foundingYear;
        $this->description = $description;
        $this->website = $website;
        $this->phone = $phone;
        $this->industry = $industry;
        $this->ceo = $ceo;
        $this->isPubliclyTraded = $isPubliclyTraded;
        $this->country = $country;
        $this->founder = $founder;
        $this->totalEmployees = $totalEmployees;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFoundingYear(): int
    {
        return $this->foundingYear;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getWebsite(): string
    {
        return $this->website;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getIndustry(): string
    {
        return $this->industry;
    }

    public function getCeo(): string
    {
        return $this->ceo;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getFounder(): string
    {
        return $this->founder;
    }

    public function getTotalEmployee(): int
    {
        return $this->totalEmployees;
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
            CEO: %s\n
            Country: %s\n
            Founder: %s\n
            TotalEmployees Num: %s",
            $this->name,
            $this->foundingYear,
            $this->description,
            $this->website,
            $this->phone,
            $this->industry,
            $this->ceo,
            $this->country,
            $this->founder,
            $this->totalEmployees
        );
    }
    public function toHTML(): string
    {
        return sprintf(
            "
            <div class='user-card'>
                <div class='avater'>SAMPLE</div>
                <h2>%s</h2>
                <p>FoundYear: %s</p>
                <p>Descripiton: %s</p>
                <p>URL: %s</p>
                <p>Phone: %s</p>
                <p>Industry : %s</p>
                <p>CEO: %s</p>
                <p>Country : %s</p>
                <p>Founder : %s</p>
                <p>Total Num : %s</p>
            </div>",
            $this->name,
            $this->foundingYear,
            $this->description,
            $this->website,
            $this->phone,
            $this->industry,
            $this->ceo,
            $this->country,
            $this->founder,
            $this->totalEmployees
        );
    }

    public function toMarkDown(): string
    {
        return "## User : {$this->name}
        -Found Year : {$this->foundingYear}
        -Description : {$this->description}
        -WebSite : {$this->website}
        -Phone : {$this->phone}
        -Industry: {$this->industry}
        -CEO : {$this->ceo}
        -Country: {$this->country}
        -Founder : {$this->founder}
        -Total Num : {$this->totalEmployees}
        ";
    }

    public function toArray(): array
    {
        return [
            "name" => $this->name,
            "foundYear" => $this->foundingYear,
            "description" => $this->description,
            "website" => $this->website,
            "phone" => $this->phone,
            "industry" => $this->industry,
            "ceo" => $this->ceo,
            "country" => $this->country,
            "founder" => $this->founder,
            "totalemployees" => $this->totalEmployees
        ];
    }
}
