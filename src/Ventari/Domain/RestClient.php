<?php

namespace Tollwerk\Ventari\Domain;

interface RestClient
{
    public function get(array $request);

    public function put(array $request);

    public function patch(array $request);

    public function post(array $request);

    public function delete(array $request);
}