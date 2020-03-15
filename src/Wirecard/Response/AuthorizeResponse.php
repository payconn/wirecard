<?php

namespace Payconn\Wirecard\Response;

class AuthorizeResponse extends WirecardResponse
{
    public function isRedirection(): bool
    {
        return true;
    }

    public function getRedirectForm(): ?string
    {
        return $this->response['RedirectUrl'];
    }
}
