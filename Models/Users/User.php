<?php

namespace Models\Users;

use DateTime;
use Interfaces\FileConvertible;

class User implements FileConvertible
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $hashedPassword;
    private string $phoneNumber;
    private string $address;
    private DateTime $birthDate;
    private DateTime $membershipExpirationDate;
    private string $role;

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
        string $role
    ) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->phoneNumber = $phoneNumber;
        $this->address = $address;
        $this->birthDate = $birthDate;
        $this->membershipExpirationDate = $membershipExpirationDate;
        $this->role = $role;
    }

    public function getId() : string {
        return $this->id;
    }

    public function getFirstName() : string {
        return $this->firstName;        
    }

    public  function getLastName() : string {
        return $this->lastName;        
    }

    public function getEmail() : string {
        return $this->email;        
    }

    public function getPassword() : string {
        return $this->hashedPassword;
    }

    public function getPhoneNumber() : string {
        return $this->phoneNumber;        
    }

    public function getAddress() : string {
        return $this->address;
    }

    public function getBirthDate() : DateTime {
        return $this->birthDate;
    }

    public function getMembershipExpireationDate() : DateTime {
        return $this->getMembershipExpireationDate();       
    }

    public function getRole() : string {
        return $this->role;
    }


    public function login(string $password): bool
    {
        // Validate password with the hashed password
        return password_verify($password, $this->hashedPassword);
    }

    public function updateProfile(string $address, string $phoneNumber): void
    {
        $this->address = $address;
        $this->phoneNumber = $phoneNumber;
    }

    public function renewMembership(DateTime $expirationDate): void
    {
        $this->membershipExpirationDate = $expirationDate;
    }

    public function changePassword(string $newPassword): void
    {
        $this->hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    }

    public function hasMembershipExpired(): bool
    {
        $currentDate = new DateTime();
        return $currentDate > $this->membershipExpirationDate;
    }


    public function toString(): string
    {
        return sprintf(
            "User ID: %d \nName : %s %s\nEmail: %s\nAddress: %s\nBirthDate: %s\nMemberShip Expiration Date: %s\nRole: %s\n",
            $this->id,
            $this->firstName,
            $this->lastName,
            $this->address,
            $this->birthDate,
            $this->membershipExpirationDate->format("Y-m-d"),
            $this->role,
        );
    }

    public function toHTML(): string
    {
        return sprintf(
            "
            <div class='user-card'>
                <div class='avater'>SAMPLE</div>
                <h2>%s %s</h2>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
                <p>BirthDate : %s</p>
                <p>MemberShip Expireation Date: %s</p>
                <p>Role : %s</p>
            </div>",
            $this->firstName,
            $this->lastName,
            $this->email,
            $this->phoneNumber,
            $this->address,
            $this->birthDate->format("Y-m-d"),
            $this->membershipExpirationDate->format("Y-m-d"),
            $this->role
        );
    }

    public function toMarkDown(): string
    {
        return "## User : {$this->firstName} {$this->lastName}
                 -Email : {$this->email}
                 -Address: {$this->address}
                 -BirthDate : {$this->birthDate}
                 -IsActive: {$this->hasMembershipExpired() }
                 -Role : {$this->role}";
    }

    public function toArray(): array
    {
        return [
            "id" => $this->id,
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "email" => $this->email,
            "password" => $this->hashedPassword,
            "phoneNumber" => $this->phoneNumber,
            "address" => $this->address,
            "birthDate" => $this->birthDate,
            "isActive" => $this->hasMembershipExpired(),
            "role" => $this->role,
        ];
    }
}

?>