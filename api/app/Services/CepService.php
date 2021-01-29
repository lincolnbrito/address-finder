<?php

namespace App\Services;

class CepService extends ApiService
{
    public function __construct()
    {
        parent::__construct(config('services.cep.endpoint'));
    }

    /**
     * @param string $zipcode
     * @return \Illuminate\Http\Client\Response
     */
    public function getAddress(string $zipcode): \Illuminate\Http\Client\Response
    {
        return $this->get($zipcode, []);
    }
}
