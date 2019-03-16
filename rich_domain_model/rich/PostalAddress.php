<?php
declare(strict_types=1);

namespace App;


class PostalAddress
{
    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $postalCode;

    public function __construct(string $street, string $city, string $postalCode)
    {
        $this->street = $street;
        $this->city = $city;
        $this->postalCode = $postalCode;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }
}