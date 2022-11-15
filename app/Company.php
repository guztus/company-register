<?php declare(strict_types=1);

namespace App;

class Company
{
    private ?string $name;
    private ?string $registrationCode;
    private ?string $type;
    private ?string $registered = null;
    private ?string $terminated = null;
    private ?string $closed = null;
    private ?string $address;

    public function __construct(?string $registrationCode, ?string $name, ?string $type, ?string $registered, ?string $terminated, ?string $closed, ?string $address)
    {
        $this->name = $name;
        $this->registrationCode = $registrationCode;
        $this->type = $type;
        if (strlen(trim($registered)) != 0) {
            $this->registered = $registered;
        }
        if (strlen(trim($closed)) != 0) {
            $this->closed = $closed;
        }
        if (strlen(trim($terminated)) != 0) {
            $this->terminated = $terminated;
        }
        $this->address = $address;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getRegistrationCode(): ?string
    {
        return $this->registrationCode;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function getClosed(): ?string
    {
        return $this->closed;
    }

    public function getRegistered(): ?string
    {
        return $this->registered;
    }

    public function getTerminated(): ?string
    {
        return $this->terminated;
    }
}