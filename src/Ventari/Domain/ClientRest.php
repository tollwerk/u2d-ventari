<?php

namespace Tollwerk\Ventari\Domain;

interface ClientRest
{
    public function get($token, $request);

    public function put($token, $request);

    public function patch($token, $request);

    public function post($token, $request);

    public function delete($token, $request);
}