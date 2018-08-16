<?php

namespace Tollwerk\Ventari\Domain\Contract;


interface CurlClientInterface
{
    public function dispatchRequest(string $request, array $params);

    public function dispatchSubmission(string $request, array $params);
}