<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Services\CepService;
use Exception;
use Illuminate\Http\JsonResponse;

class AddressController extends Controller
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
    public function index()
    {
        $addresses = Address::paginate();
        return response()->json($addresses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AddressRequest $request
     * @return JsonResponse
     */
    public function store(AddressRequest $request)
    {
        try {
            $address = Address::create($request->all());

            return response()->json([
                'message' => 'The address has been updated',
                'data' => $address
            ]);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'The address can not be updated',
                'details' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param string $zipcode
     * @return JsonResponse
     */
    public function show(int $id)
    {
        try{
            $address = Address::find($id);

            return response()->json([
                'data' => $address
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "The address can not be found",
                'details' => $e->getMessage()
            ], 404);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param AddressRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(AddressRequest $request, int $id): JsonResponse
    {
        try {
            $address = Address::find($id);
            $address->update($request->all());

            return response()->json([
                'message' => 'The address has been updated',
                'data' => $address
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'The address can not be updated',
                'details' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $address = Address::find($id);
            $address->delete();

            return response()->json([
                'message' => 'The address has been deleted'
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'The address can not be deleted',
                'details' => $e->getMessage()
            ], 400);
        }
    }
}
