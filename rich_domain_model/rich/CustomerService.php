<?php
declare(strict_types=1);

namespace App;

class CustomerService
{
    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function changeCustomerName(
        int $id,
        string $firstName,
        string $lastName
    ) {
        $customer = $this->customerRepository->get($id);

        if ($customer === null) {
            throw new \InvalidArgumentException("Customer doesn't exist");
        }

        $customer->changePersonalName($firstName, $lastName);

        $this->customerRepository->save($customer);
    }
}