<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Countries;
use App\Models\State;
use App\Models\City;

class LocationController extends Controller
{
    public function countries_index(Request $request){
        $data['getRecord'] = Countries::get();      
        return view('admin.countries.list', $data);
    }

    public function countries_add()
    {
        return view('admin.countries.add');
    }

    public function countries_post(Request $request)
    {
    //    dd($request->all());
    $save = new Countries;
    $save->country_name = trim($request->country_name);
    $save->save();
    return redirect('admin/countries')->with('success', 'Country added successfully!');
    }

    public function countries_edit($id, Request $request)
    {
        $data['getRecord'] = Countries::find($id);  
        return view('admin.countries.edit', $data);
    }

    public function countries_update($id,Request $request)
    {
    //    dd($request->all());
    $save = Countries::find($id);
    $save->country_name = trim($request->country_name);
    $save->save();
    return redirect('admin/countries')->with('success', 'Country updated successfully!');
    }

    public function countries_delete($id,Request $request)
    {
    //    dd($request->all());
    $save = Countries::find($id);
    $save->delete();
    toastr()->timeOut(5000)->closeButton()->addSuccess('Country deleted successfully!');
    return redirect()->back();
    }

    //State

    public function state_index(Request $request){
        $data['getRecord'] = State::select('state.*','countries.country_name')->join('countries','countries.id','=','state.countries_id')->get();      
        return view('admin.state.list', $data);
    }
    public function state_add(Request $request)
    {
        $data['getCountries'] = Countries::get();
        return view('admin.state.add', $data);
    }

    public function state_post(Request $request)
    {
    //    dd($request->all());
    $save = new State;
    $save->countries_id = trim($request->countries_id);
    $save->state_name = trim($request->state_name);
    $save->save();
   
    toastr()->timeOut(5000)->closeButton()->addSuccess('State added successfully!');
    return redirect('admin/countries');
    }

    public function state_edit($id, Request $request)
    {
        $data['getCountries'] = Countries::get(); 
        $data['getRecord'] = State::find($id);  
        return view('admin.state.edit', $data);
    }

    public function state_update($id,Request $request)
    {
    //    dd($request->all());
    $save = State::find($id);
    $save->countries_id = trim($request->countries_id);
    $save->state_name = trim($request->state_name);
    $save->save();
    toastr()->timeOut(5000)->closeButton()->addSuccess('State updated successfully!');
    return redirect('admin/state');
    }

    public function state_delete($id,Request $request)
    {
    //    dd($request->all());
    $save = State::find($id);
    $save->delete();
    toastr()->timeOut(5000)->closeButton()->addSuccess('State deleted successfully!');
    return redirect()->back();
    }


    //City

    public function city_index(Request $request){
        $data['getRecord'] = City::getRecordJoin();      
        return view('admin.city.list', $data);
    }

    public function city_add(Request $request)
    {
        $data['getCountries'] = Countries::get(); 

//       $data['getCountries'] = City::get();
        return view('admin.city.add', $data);
    }


    public function get_state_name($countryId, Request $request) {
        $states = State::where('countries_id', $countryId)->select('id', 'state_name')->get();
        return response()->json($states);
    }
    

    public function city_insert(Request $request){
       $save = new City;
       $save->countries_id = $request->countries_id;
       $save->state_id = $request->state_id;
       $save->city_name = trim($request->city_name);
       $save->save();
       toastr()->timeOut(5000)->closeButton()->addSuccess('City added successfully!');
       return redirect('admin/city');
    }

}
