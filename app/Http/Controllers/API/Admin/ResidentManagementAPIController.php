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
        $response = [];
        $request['resident_number'] = date('Y').rand(0,96399);
        $request['password'] = Hash::make($request['password']);
        try {
            $NewUser = User::create($request->all());
            if($NewUser) {
                $response['message'] = "New Resident has been registered";
            }
        } catch(Exception $e) {
            $response['message'] = $e->getMessage();
        }
        return Response()->json($response);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $residentInformation = User::find($id);
        if(!$residentInformation)
        {
            abort(404);
        }

        return response()->json([
            'data' => $residentInformation
        ]);
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
