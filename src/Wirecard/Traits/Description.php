<?php

namespace Payconn\Wirecard\Traits;

trait Description
{
    /**
     * @var string
     */
    protected $description;

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
