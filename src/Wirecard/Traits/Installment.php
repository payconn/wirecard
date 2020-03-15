<?php

namespace Payconn\Wirecard\Traits;

trait Installment
{
    protected $installment;

    public function getInstallment(): int
    {
        if (1 == $this->installment) {
            return 0;
        }

        return $this->installment;
    }

    public function setInstallment(int $installment): void
    {
        $this->installment = $installment;
    }
}
