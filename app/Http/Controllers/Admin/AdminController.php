<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Display a listing of the resource.
    public function index(Admin $admins)
    {
        $admins = Admin::all();
        //return view('admin.admins.index', compact('admins'));
        return view('admin.admins.index')->with('title',trans('site.admins'))->with('admins',$admins);

    } // end of index


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create')->with('title',trans('site.create_admins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name'  => 'required',
            'email'   => 'required|email|unique:admins',
            'password'=> 'required|confirmed|min:6',
        ]);

        $request_data = $request->except(['password', 'password_confirmtion', 'permissions']);
        $request_data['password'] = bcrypt($request->password);

        $admin = Admin::create($request_data);
        $admin->attachRole('admin');
        $admin->syncPermissions($request->permissions);

        session()->flash('success',__('site.added_successfully'));
        //return redirect()->view('admin.admins.index');
        //return redirect()->route('admins.index');
        return redirect(url('dashboard/admins'));


    } // end of store


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $title = trans('admin.edit');
        return view('admin.admins.edit', compact('admin', 'title'));

    } // end of edit

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name'  => 'required',
            'email'   => 'required|email|unique:admins,email,'.$admin->id,
            'password'=> 'required|confirmed|min:6',
        ]);

        $request_data = $request->except(['password', 'password_confirmtion', 'permissions']);
        $request_data['password'] = bcrypt($request->password);

        $admin->update($request_data);
        $admin->syncPermissions($request->input('permission'));

        session()->flash('success',__('site.updated_successfully'));
        return redirect(url('dashboard/admins'));
        //return redirect()->view('admin.admins.index');
       // return redirect()->route('admins.index');

    } // end of update

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //Admin::find($id)->delete();
        $admin->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect(url('dashboard/admins'));
        //session()->flash('success', trans('admin.deleted_record'));

    } // end of destroy

} // end of controller
