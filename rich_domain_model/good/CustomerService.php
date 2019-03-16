<?php
declare(strict_types=1);

namespace App;

class CustomerService
{
    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    /**
     * CustomerService constructor.
     * @param CustomerRepository $customerRepository
     */
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function saveCustomer(
        int $id,
        string $firstName,
        string $lastName,
        string $street,
        string $city,
        string $postalCode,
        string $phone,
        ?string $email
    ) {
        $customer = $this->customerRepository->get($id);

        if ($customer === null) {
            $customer = new Customer();
            $customer->setId($id);
        }

        $customer->setFirstName($firstName);
        $customer->setLastName($lastName);
        $customer->setStreet($street);
        $customer->setCity($city);
        $customer->setPostalCode($postalCode);
        $customer->setPhone($phone);
        if ($email !== null) {
            $customer->setEmail($email);
        }

        $this->customerRepository->save($customer);
    }
}