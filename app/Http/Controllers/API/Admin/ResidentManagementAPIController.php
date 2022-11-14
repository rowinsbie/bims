<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\createResidentRequest;
use Hash;
class ResidentManagementAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'residents' => User::all()
        ]);
    }

    /**
     * add a new resident
     *
     * @param  App\Http\Requests\createResidentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(createResidentRequest $request)
    {
        $resultMessage = "";
        // generate new resident #
        $request['resident_number'] = 'rd-'.rand(date('Y',time()),99999);
        $request['password'] = Hash::make($request['password']);
        try {
            $newResident = User::create($request->all());
            if($newResident) {
                $resultMessage = "New Resident has been registered";
            }
        } catch(Exception $e) {
            $resultMessage = "Error: " . $e->getMessage();
        }

        return response()->json([
            'message' => $resultMessage
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
