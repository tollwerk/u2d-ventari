<?php

namespace Tollwerk\Ventari\Domain\Contract;

interface HttpClientInterface
{
    public function dispatchRequest(string $request, array $param);
}
