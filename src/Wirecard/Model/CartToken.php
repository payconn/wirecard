<?php

namespace Payconn\Wirecard\Model;

class CartToken
{
    /**
     * @var string|null
     */
    protected $ccTokenId;

    /**
     * @var string
     */
    protected $customerId;

    /**
     * @var int
     */
    protected $validityPeriod;

    /**
     * CartToken constructor.
     *
     * @param int $validityPeriod
     */
    public function __construct(string $customerId, ?string $ccTokenId, ?int $validityPeriod)
    {
        $this->ccTokenId = $ccTokenId;
        $this->customerId = $customerId;
        $this->validityPeriod = $validityPeriod;
    }

    public function getCcTokenId(): ?string
    {
        return $this->ccTokenId;
    }

    public function setCcTokenId(?string $ccTokenId): void
    {
        $this->ccTokenId = $ccTokenId;
    }

    public function getCustomerId(): string
    {
        return $this->customerId;
    }

    public function setCustomerId(string $customerId): void
    {
        $this->customerId = $customerId;
    }

    public function getValidityPeriod(): int
    {
        if (!$this->validityPeriod) {
            return 0;
        }

        return $this->validityPeriod;
    }

    public function setValidityPeriod(int $validityPeriod): void
    {
        $this->validityPeriod = $validityPeriod;
    }
}
