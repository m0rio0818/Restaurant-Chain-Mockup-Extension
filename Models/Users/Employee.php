<?php

namespace Models\Users;

use DateTime;
use Interfaces\FileConvertible;
use Models\Users\User;

class Employee extends User implements FileConvertible
{
    private string $jobTitle;
    private float $salary;
    private Datetime $startDate;
    private array $awards;

    public function __construct(
        int $id,
        string $firstName,
        string $lastName,
        string $email,
        string $password,
        string $phoneNumber,
        string $address,
        DateTime $birthDate,
        DateTime $membershipExpirationDate,
        string $role,
        string $jobTitle,
        float $salary,
        DateTime $startDate,
        array $awards
    ) {
        parent::__construct(
            $id,
            $firstName,
            $lastName,
            $email,
            $password,
            $phoneNumber,
            $address,
            $birthDate,
            $membershipExpirationDate,
            $role
        );
        $this->jobTitle = $jobTitle;
        $this->salary = $salary;
        $this->startDate = $startDate;
        $this->awards = $awards;
    }

    public function getFullName(): string
    {
        return $this->getFirstName() . " " . $this->getLastName();
    }


    public function toString(): string
    {
        return sprintf(
            "
            User ID: %d \n
            Name : %s %s\n
            Email: %s\n
            Address: %s\n
            BirthDate: %s\n
            MemberShip Expiration Date: %s\n
            Role: %s\n
            JobTitle: %s\n
            Salary: %s\n
            StartDate : %s\n
            Award: %s\n
            ",
            $this->getId(),
            $this->getFirstName(),
            $this->getLastName(),
            $this->getAddress(),
            $this->getBirthDate()->format("Y-m-d"),
            $this->getMembershipExpireationDate()->format("Y-m-d"),
            $this->getRole(),
            $this->jobTitle,
            $this->salary,
            $this->startDate,
            $this->awards,
        );
    }

    public function toHTML(): string
    {
        return sprintf(
            "
            <tr>
                <td>%d</td>
                <td>%s %s</td>
                <td>%s</td>
                <td>%d</td>
            </tr>
            ",
            $this->getId(),
            $this->getFirstName(),
            $this->getLastName(),
            $this->jobTitle,
            $this->startDate->format('Y-m-d'),
        );
    }

    public function toMarkDown(): string
    {
        return "  - #####  {$this->getFullName()} \n"  .
            "      - Role : {$this->getRole()} \n"  .
            "      - JobTitle : {$this->jobTitle} \n"  .
            "      - Salary : \${$this->salary} \n"  .
            "      - startDate : {$this->startDate->format('Y-m-d')} \n";
    }

    public function toArray(): array
    {
        return [
            "id" => $this->getId(),
            "name" => $this->getFullName(),
            "email" => $this->getEmail(),
            "phoneNumber" => $this->getPhoneNumber(),
            "birthDate" => $this->getBirthDate()->format("Y-m-d"),
            "role" => $this->getRole(),
            "salary" => $this->salary,
            "startdate" => $this->startDate->format("Y-m-d"),
        ];
    }
}
