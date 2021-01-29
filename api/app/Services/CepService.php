<?php

namespace App\Services;

use App\Models\Address;

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

    /**
     * @param string $zipcode
     * @return mixed
     */
    public function findOrImport(string $zipcode)
    {
        $address = Address::where('zipcode', $zipcode)->first();

        if(!$address) {

            $response = $this->getAddress($zipcode);

            if($response->failed()) {
                throw new \RuntimeException("Zipcode not found at API");
            }

            $address = Address::updateOrCreate(
                [
                    'zipcode' => $response->json()['cep']
                ],
                [
                    'zipcode' => $response->json()['cep'],
                    'street' => $response->json()['street'],
                    'neighborhood' => $response->json()['neighborhood'],
                    'city' => $response->json()['city'],
                    'state' => $response->json()['state'],
                ]
            );
        }

        return $address;
    }
}
