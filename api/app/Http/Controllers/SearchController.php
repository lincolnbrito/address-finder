<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Services\CepService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    protected $service;

    public function __construct(CepService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function zipcode(string $zipcode)
    {
        try{
            $address = $this->service->findOrImport($zipcode);

            return response()->json([
                'data' => [$address]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "The address can not be found for zipcode {$zipcode}",
                'details' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function street(Request $request)
    {
        try {
            $addresses = Address::search($request->get('street'));

            return response()->json([
                'data' => $addresses
            ]);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'The address can not be updated',
                'details' => $e->getMessage()
            ], 400);
        }
    }
}
