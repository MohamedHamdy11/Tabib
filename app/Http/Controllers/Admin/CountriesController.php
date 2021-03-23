<?php
namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Country $countries)
   {
      $countries = Country::all();
      return view('admin.countries.index')->with('title',__('site.countries'))->with('countries', $countries);
      //return $country->render('admin.countries.index', ['title' => trans('admin.countries')]);
   } // end of index

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.countries.create', ['title' => trans('admin.create_countries')]);
   } // end of create

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {

       $data = [];
       foreach (config('translatable.locales') as $one_lang) {
           $data += [$one_lang.'.country_name' => 'required|min:2|max:100'];
       }
       $data_request =$request->validate($data);

       Country::create($data_request);

        session()->flash('success',__('site.added_successfully'));
        //return redirect()->view('admin.admins.index');
        return redirect()->route('countries.index');
        //return redirect(url('dashboard/countries'));
     
   } // end of store


   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit(Country $country)
   {
      $title   = trans('site.edit');
      return view('admin.countries.edit', compact('country', 'title'));
   } // end of edit 

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Country $country)
   {
        $data = [];
        foreach (config('translatable.locales') as $one_lang) {
            $data += [$one_lang.'.country_name' => 'required|min:2|max:100'];
        }
        $data_request =$request->validate($data);

        $country->update($data_request);

        session()->flash('success',__('site.updated_successfully'));
        //return redirect()->view('admin.admins.index');
        //return redirect()->route('countries.index');
        return redirect(url('dashboard/countries'));
   } // end of update

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy(Country $country)
   {
      
        //Country::find($id)->delete();
        $country->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect(url('dashboard/countries'));
        //session()->flash('success', trans('admin.deleted_record'));

   } // end of delete


} // end of controller
