<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Realty ;

class search_controller extends Controller
{
    public function price(Request $request){
    	$this->validate($request , ['lower_price'=>'required','higher_price'=>'required']);
        $lower_price = $request->input('lower_price');
        $higher_price = $request->input('higher_price');

        $realties = Realty::get();
        $search_results = [];

        $i = 0 ; 
        foreach ($realties as $realty) {
        	if(($realty->price) > $lower_price && ($realty->price) < $higher_price ){
        		$search_results = array_add($search_results , $i , $realty);
        		$i++ ;
        	}
        }

        return view('front.realty.searchResults' , compact('search_results', $search_results));
    }

    public function area(Request $request)
    {
    	$this->validate($request , ['lower_area'=>'required','higher_area'=>'required']);
        $lower_area = $request->input('lower_area');
        $higher_area = $request->input('higher_area');

        $realties = Realty::get();
        $search_results = [];

        $i = 0 ; 
        foreach ($realties as $realty) {
        	if(($realty->area) > $lower_area && ($realty->area) < $higher_area){
        		$search_results = array_add($search_results , $i , $realty);
        		$i++ ;
        	}
        }
        return view('front.realty.searchResults' , compact('search_results', $search_results));

    }

    public function country(Request $request)
    {
    	$this->validate($request , ['country'=>'required']);
    	$country = $request->input('country');

    	$realties = Realty::get();
        $search_results = [];

        $i = 0 ; 
        foreach ($realties as $realty) {
        	if(($realty->country) === $country){
        		$search_results = array_add($search_results , $i , $realty);
        		$i++ ;
        	}
        }
        return view('front.realty.searchResults' , compact('search_results', $search_results));

    }

    public function city(Request $request)
    {
    	$this->validate($request , ['country'=>'required' ,'city'=>'required']);
    	$country = $request->input('country');
    	$city = $request->input('city');

    	$realties = Realty::get();
        $search_results = [];

        $i = 0 ; 
        foreach ($realties as $realty) {
        	if(($realty->country) === $country && ($realty->city) === $city){
        		$search_results = array_add($search_results , $i , $realty);
        		$i++ ;
        	}
        }
        return view('front.realty.searchResults' , compact('search_results', $search_results));

    }

    public function region(Request $request)
    {
    	$this->validate($request , ['country'=>'required' , 'city'=>'required' , 'region'=>'required']);
    	$country = $request->input('country');
    	$city = $request->input('city');
    	$region = $request->input('region');

    	$realties = Realty::get();
        $search_results = [];

        $i = 0 ; 
        foreach ($realties as $realty) {
        	if(($realty->country) === $country && ($realty->city) === $city && ($realty->region) === $region){
        		$search_results = array_add($search_results , $i , $realty);
        		$i++ ;
        	}
        }
        return view('front.realty.searchResults' , compact('search_results', $search_results));

    }

    public function type(Request $request)
    {
    	$this->validate($request , ['type'=>'required']);
    	$type = $request->input('type');

    	$realties = Realty::get();
        $search_results = [];

        $i = 0 ; 
        foreach ($realties as $realty) {
        	if(($realty->type) === $type){
        		$search_results = array_add($search_results , $i , $realty);
        		$i++ ;
        	}
        }
        return view('front.realty.searchResults' , compact('search_results', $search_results));

    }

}
