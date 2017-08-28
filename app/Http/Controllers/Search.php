<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Travel;
use App\User;
use App\Car;
use App\Passenger;
use Carbon\Carbon;
use Auth;

class Search extends Controller
{
    //
    public function index(Request $request) 
    {
        

        if ($request->input('day')) 
        {
            $day = $request->input('day');
            $cityDeparture = $request->input('cityDeparture');
            $cityArrived = $request->input('cityArrived');
        } 
        else 
        {
            return back()->withInput();
        }
        $where = new \stdclass;
        $where->day= $day; 
        $where->cityDeparture =  $cityDeparture;
        $where->cityArrived = $cityArrived;

        session(['day' => $day,'cityDeparture' => $cityDeparture,'cityArrived' => $cityArrived]);
        
        $where->login = (Auth::user() !== null) ? true : false;
         
        return view('search')->with('data', $where);
    }


    public function getTravels (Request $request) {
        
        $where = new \stdclass;
        $day = session('day');
        $cityDeparture = session('cityDeparture');
        $cityArrived = session('cityArrived');
        $where = ["cityDeparture" => $cityDeparture , "cityArrived" => $cityArrived];

        // Get info travel + user + cars..
        $travels = Travel::where($where)->where('day', 'LIKE', "%$day%")->get();
        
        $arrayTravels = array();
        foreach ($travels as $travel) {


            $passengers = Passenger::where(["travel_id" => $travel->id])->get();



            $profile = User::find($passengers->user_id);
            if (!isset($profile))
                return Response()->json("no se ha poidido encontrar usuario");

            $cars = Car::find($profile->cars_id);

            $objTravel = new \stdclass;
            $objTravel->id = $travel->id;
            $objTravel->day = $travel->day;
            $objTravel->cityDeparture = $travel->cityDeparture;
            $objTravel->cityArrived = $travel->cityArrived;
            $objTravel->price = $travel->price;
            $objTravel->name = $profile->name;

            $objTravel->day = Carbon::parse($objTravel->day)->format('H-i');

            /* Calculo de plazas disponibles */
            $objPassenger = $cars->seats - Passenger::where(["travel_id" => $travel->id])->count();
            $objTravel->squares = $objPassenger;

            
            array_push($arrayTravels, $objTravel);
        }

        
        return Response()->json($arrayTravels);
    }

    /* MEthod for know */
    private function getAunthentication (Request $request) {
        if (Auth::user()->id)
            return Response()->json(["response" => true]);
        else
            return Response()->json(["response" => false]);
    }
}
