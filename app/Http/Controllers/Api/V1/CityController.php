<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\City;

class CityController extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request;
    }

    public function getCities($id=0){
        return City::where('father',$id)->get(['id','father','name']);
    }

}