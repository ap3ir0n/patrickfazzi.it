<?php
declare(strict_types=1);

namespace App;

class Customer
{
    /** @var int */
    private $id;

    /** @var string */
    private $firstName;

    /** @var string */
    private $lastName;

    /** @var string */
    private $address;

    /** @var string */
    private $phone;

    /** @var string */
    private $email;

    public function __construct(
        int $id,
        string $firstName,
        string $lastName,
        PostalAddress $address,
        Telephone $phone,
        ?EmailAddress $email
    ) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
    }

    public function changePersonalName(string $firstName, string $lastName): void
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function changeEmail(EmailAddress $newEmailAddress): void
    {
        $this->email = $newEmailAddress;
    }

    public function relocateTo(PostalAddress $newPostalAddress): void
    {
        $this->address = $newPostalAddress;
    }

    public function changeTelephone(Telephone $newTelephone): void
    {
        $this->phone = $newTelephone;
    }

    public function disconnectTelephone(): void
    {
        $this->phone = null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getAddress(): PostalAddress
    {
        return $this->address;
    }

    public function getPhone(): ?Telephone
    {
        return $this->phone;
    }

    public function getEmail(): ?EmailAddress
    {
        return $this->email;
    }
}