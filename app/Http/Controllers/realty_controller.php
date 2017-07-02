<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Realty;
use App\Comment;
use App\Session;

use Auth;
use DB;


class realty_controller extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $realties = Realty::orderBy('id', 'desc')->paginate(10);
        return view('front.index', compact('realties', $realties));
    }

    public function create()
    {
        //$countries = DB::table('apps_countries')->lists('country_name', 'country_code');
        return view('front.realty.add_new');
    }

    public function store(Request $request)
    {
        $input = (object) $request->all();
        $user_id = Auth::user()->id;

        //country , city , region , street , apartment_no , house_no , price , area , telephone , description , type
        /*$this->validate($request ,['country'=>'required' , 'city'=>'required' , 'street'=>'required' , 'house_no'=>'required' , 'price'=>'required' , 'area'=>'required' , 'price'=>'required' ,'type'=>'required' , 'telephone'=>'required|max:11']);*/
        
        /*$country = $request->input('country');
        $city = $request->input('city');
        $region = $request->input('region');
        $street = $request->input('street');
        $house_no = $request->input('house_no');
        $apartment_no = $request->input('apartment_no');*/
        /*$price = $request->input('price');
        $area = $request->input('area');
        $type = $request->input('type');
        $description = $request->input('description');*/
        //$telephone = $request->input('telephone'); // because the user table having already him/er telephones
        

        // Ahmed: short code modified for above ^
        /*
        $input = (object) $request->all();
        $country = $input->country;
        $city = $input->city;
        $type = $input->type;
        etc...
        */

        $realty = new Realty;
        /*$realty->country = $country;
        $realty->city = $city;
        $realty->region = $region;
        $realty->street = $street;
        $realty->house_no = $house_no;
        $realty->apartment_no = $apartment_no;*/
        $realty->lat = $input->lat;
        $realty->lng = $input->lng;
        $realty->address1 = $input->address1;
        $realty->address2 = $input->address2;
        $realty->price = $input->price;
        $realty->area = $input->area;
        $realty->type = $input->type;
        $realty->description = $input->description;
        //$realty->telephone = $telephone;
        $realty->user_id = $user_id;
        $realty->save();

        //to this realty page
        return redirect("/realty/$realty->id");
    }

    public function show($id)
    {
        $realty = Realty::find($id);

        return view('front.realty.show_realty', compact('realty', $realty));
    }

    public function edit($id)
    {
        $realties = Realty::where('id',$id)->get();
        return view('front.realty.edit_realty', compact('realties', $realties));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request ,['country'=>'required' , 'city'=>'required' , 'street'=>'required' , 'house_no'=>'required' , 'price'=>'required' , 'area'=>'required' , 'price'=>'required' ,'type'=>'required' , 'telephone'=>'required|max:11']);
        
        $country = $request->input('country');
        $city = $request->input('city');
        $region = $request->input('region');
        $street = $request->input('street');
        $house_no = $request->input('house_no');
        $apartment_no = $request->input('apartment_no');
        $price = $request->input('price');
        $area = $request->input('area');
        $type = $request->input('type');
        $description = $request->input('description');
        $telephone = $request->input('telephone');
        $user_id = Auth::user()->id;

        $realty = Realty::find($id);
        $realty->country = $country;
        $realty->city = $city;
        $realty->region = $region;
        $realty->street = $street;
        $realty->house_no = $house_no;
        $realty->apartment_no = $apartment_no;
        $realty->price = $price;
        $realty->area = $area;
        $realty->type = $type;
        $realty->description = $description;
        $realty->telephone = $telephone;
        $realty->user_id = $user_id; 
        $realty->save();

        return redirect('/realty/$realty->id');
    }

    public function destroy($id)
    {
        Realty::where('id',$id)->delete();

        return redirect('/realty');
    }

    public function add($id,$comment2){
        $comment = new Comment();
        $comment->post_id = $id;
        $comment->comment = $comment2;
        $comment->user_id = Auth::user()->id;//Session::get('user_name');
        $comment->save();
       return '<a><b>'.$comment->user->name."</b></a> ".$comment2;
    }
}
