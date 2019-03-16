<?php
declare(strict_types=1);

namespace App;

interface CustomerRepository
{
    public function get(int $id): ?Customer;

    public function save(Customer $customer): void;
}