<?php

namespace Models\RestaurantLocations;

use Interfaces\FileConvertible;

class RestaurantLocation implements FileConvertible
{
    private string $name;
    private string $address;
    private string $city;
    private string $state;
    private string $zipCode;
    private array $employees;
    private bool $isOpen;
    private bool $hasDriveThru;
    private int $locationId;

    public function __construct(
        string $name,
        string $address,
        string $city,
        string $state,
        string $zipCode,
        array $employees,
        bool $isOpen,
        bool $hasDriveThru,
        int $locationId
    ) {
        $this->name  = $name;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
        $this->employees = $employees;
        $this->isOpen = $isOpen;
        $this->hasDriveThru = $hasDriveThru;
        $this->locationId = $locationId;
    }

    public function toString(): string
    {
        return sprintf(
            "
            Name: %s\n
            Address: %s\n
            City: %s\n
            State: %s\n
            ZipCode: %s\n
            ",
            $this->name,
            $this->address,
            $this->city,
            $this->state,
            $this->zipCode,
        );
    }
    public function toHTML(): string
    {
        $emoloyeeLists = "";
        foreach ($this->employees as $employee) {
            $emoloyeeLists .= $employee->toHTML();
        }

        $parent = "accordion_" . $this->locationId . "_parent";
        $collapse = "accordion_" . $this->locationId . "_collapse";

        $address = $this->zipCode . " " . $this->state . " " . $this->city . " " . $this->address;

        return sprintf(
            "
            <div class='accordion' id='$parent' >
                <div class='accordion-item'>
                    <h2 class='accordion-header'>
                        <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#$collapse' aria-expanded='false' aria-controls='$collapse'>
                            %s
                        </button>
                    </h2>
                </div>
                <div id='$collapse' class='accordion-collapse collapse' data-bs-parent='#$parent'>
                <div class='accordion-body'>
                    <p>Name: %s</p>
                    <p>Address: %s</p>
                    <p>Employees: </p>
                    <table class='table'>
                    <thead>
                        <tr>
                        <th scope='col'>ID</th>
                        <th scope='col'>Name</th>
                        <th scope='col'>Job</th>
                        <th scope='col'>Join Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        %s
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            ",
            $this->name,
            $this->name,
            $address,
            $emoloyeeLists
        );
    }

    public function toMarkDown(): string
    {
        return "## User : {$this->name}
        -Address : {$this->address}
        -ZipCode : {$this->zipCode}
        -State : {$this->state}
        -City : {$this->city}
        ";
    }

    public function toArray(): array
    {
        return [
            "name" => $this->name,
            "address" => $this->address,
            "zipCode" => $this->zipCode,
            "state" => $this->state,
            "city" => $this->city,
            "employees" => $this->employees,
            "isOpen" => $this->isOpen,
            "hasDriveThru" => $this->hasDriveThru,
        ];
    }
}
