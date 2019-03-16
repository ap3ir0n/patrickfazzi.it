<?php
declare(strict_types=1);

namespace App;


class Telephone
{
    /**
     * @var string
     */
    private $number;

    private function __construct($number)
    {
        $this->number = $number;
    }

    public static function fromString(string $number): self
    {
        if (preg_match("/^[\+0-9\-\(\)\s]*$/", $number) !== 1) {
            throw new \InvalidArgumentException('Not a valid telephone number.');
        }

        return new self($number);
    }

    public function toString()
    {
        return $this->number;
    }

    public function isEqual(Telephone $other): bool
    {
        return $this->number === $other->number;
    }
}