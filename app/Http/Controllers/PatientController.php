<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{

    public function show(Request $request){
        try {
            $patients = Patient::all();
            return response()->json($patients, 200);
        } catch (\Exception $e) {
            return response()->json(['error'=>'Error while show for the patients'], 500);
        }
    }

    public function search(Request $request, $id){
        try {
            $patients = Patient::find($id);
            return response()->json($patients, 200);
        } catch (\Exception $e) {
            return response()->json(['error'=>'Error while search for the patients'], 500);
        }
    }

    public function create(Request $request){

        try {

            $patients = Patient::create(
                [ 'name' => $request->input('name'),
                'age' => $request->input('age'),
                'description' => ($request->input('description'))]
            );

            return response()->json($patients, 201);
        } catch (\Exception $e) {
            return response()->json(['error'=>'Error while create for the patients'], 500);
        }
    }

    public function update(Request $request, $id){
        try {
            $patients = Patient::find($id);

            if (!$patients) {
                return response()->json(['error' => 'Patient not found'], 404);
            }

            // Atualize os campos do usuário
            $patients->name = $request->input('name');
            $patients->age = $request->input('age');
            $patients->description = $request->input('description');
            $patients->save();

            return response()->json(['message' => $patients], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error while update for the patients'], 500);
        }
    }
    public function destroy($id){
        try {
            $patients = Patient::find($id);
            $patients->delete();

            return response()->json(['message' => $patients], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error while delete for the patients'], 500);
        }
    }
}
