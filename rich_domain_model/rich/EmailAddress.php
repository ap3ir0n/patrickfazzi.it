<?php
declare(strict_types=1);

namespace App;


class EmailAddress
{
    /**
     * @var string
     */
    private $email;

    /**
     * Telephone constructor.
     * @param $email
     */
    private function __construct($email)
    {
        $this->email = $email;
    }

    public static function fromString(string $email): self
    {
        $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
        if (preg_match($pattern, $email) !== 1) {
            throw new \InvalidArgumentException('Not a valid email address.');
        }

        return new self($email);
    }

    public function toString()
    {
        return $this->email;
    }
}