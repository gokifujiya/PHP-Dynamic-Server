<?php
namespace Models;

use DateTime;

class User {
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
        int $id, string $firstName, string $lastName, string $email,
        string $password, string $phoneNumber, string $address,
        DateTime $birthDate, DateTime $membershipExpirationDate, string $role
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

    public function toHTML(): string {
        return sprintf("
            <div class='user-card'>
                <div class='avatar'>SAMPLE</div>
                <h2>%s %s</h2>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
                <p>Birth Date: %s</p>
                <p>Membership Expiration Date: %s</p>
                <p>Role: %s</p>
            </div>",
            $this->firstName,
            $this->lastName,
            $this->email,
            $this->phoneNumber,
            $this->address,
            $this->birthDate->format('Y-m-d'),
            $this->membershipExpirationDate->format('Y-m-d'),
            $this->role
        );
    }
}
