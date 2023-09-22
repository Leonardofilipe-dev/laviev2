<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function show(Request $request){
        try {

            $service = Service::all();
            return response()->json($service, 200);
        } catch (\Exception $e) {
            return response()->json(['error'=>'Error while show for the service'], 500);
        }
    }

    public function search(Request $request, $id){
        try {
            $service = Service::find($id);
            return response()->json($service, 200);
        } catch (\Exception $e) {
            return response()->json(['error'=>'Error while search for the service'], 500);
        }
    }

    public function create(Request $request)
    {

        try {
            $data = $request->validate([
                'users_id' => 'required',
                'patient_id' => 'required',
                'medical_record' => 'required',
            ]);

            $service = Service::create($data);

            return response()->json($service, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation error'], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error while creating the service'], 500);
        }
    }

    public function update(Request $request, $id)
{
    try {
        // Verifique se o serviço existe
        $service = Service::find($id);

        if (!$service) {
            return response()->json(['error' => 'Service not found'], 404);
        }

        // Valide os dados de entrada
        $validatedData = $request->validate([
            'users_id' => 'required',
            'patient_id' => 'required',
            'medical_record' => 'required',
        ]);

        // Atualize o serviço usando a função update do Eloquent
        $service->update($validatedData);

        return response()->json(['message' => 'Service updated successfully'], 200);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json(['error' => 'Validation error'], 422);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error while updating the service'], 500);
    }
}
    public function destroy($id){
        try {
            $service = Service::find($id);
            $service->delete();

            return response()->json(['message' => $service], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error while delete for the service'], 500);
        }
    }
}
