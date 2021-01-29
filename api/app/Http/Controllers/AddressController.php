<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use Exception;
use Illuminate\Http\JsonResponse;

class AddressController extends Controller
{
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
    public function show(string $zipcode)
    {
        try{
            $address = Address::where('zipcode', $zipcode)->firstOrFail();

            return response()->json([
                'data' => $address
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "The address can not be found for zipcode {$zipcode}",
                'details' => $e->getMessage()
            ], 404);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param AddressRequest $request
     * @param string $zipcode
     * @return JsonResponse
     */
    public function update(AddressRequest $request, string $zipcode): JsonResponse
    {
        try {
            $address = Address::where('zipcode', $zipcode)->firstOrFail();
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
     * @param string $zipcode
     * @return JsonResponse
     */
    public function destroy(string $zipcode): JsonResponse
    {
        try {
            $address = Address::where('zipcode', $zipcode)->firstOrFail();
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
