<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ResidentAddress;

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
     * > The function creates a new user and a new resident address
     * 
     * @param createResidentRequest request This is the request object that contains the data that was
     * sent from the frontend.
     * 
     * @return A JSON response.
     */
    public function store(createResidentRequest $request)
    {
        $response = [];
       /* Creating a random password and a random resident number. */
        $request['resident_number'] = date('Y').rand(0,96399);
        $request['password'] = Hash::make("pass1234");
        try {
            /* Creating a new user and excluding the region, province, cityMun, brgy, and address. */
            $NewUser = User::create($request->except([
                'region',
                'province',
                'cityMun',
                'brgy',
                'address'
            ]));

           /* Creating a new resident address. */
            $residentAddress = ResidentAddress::create([
                'resident_id' => $NewUser->id,
                'region_id' => $request['region'],
                'province_id' => $request['province'],
                'municipal_id' => $request['cityMun'],
                'barangay_id' => $request['brgy'],
                'Address' => $request['address']
            ]);
           /* Checking if the user and the resident address has been created. */
            if($NewUser && $residentAddress) {
                $response['message'] = "New Resident has been registered";
            }
        } catch(Exception $e) {
           /* Getting the error message and storing it in the response array. */
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
