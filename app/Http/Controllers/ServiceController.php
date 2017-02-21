<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::all();
//dd($services);
        return view('admin.services.index', compact('services', $services));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$services = Service::all();

        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [

            'name'=>'required',
            'description'=>'required',
            'image'=>'image',
            'image'=>'required'
            ]);

        $service = new Service;
        $service->name = $request->name;
        $service->description = $request->description;
        
        if($images = $request->file('image')){
            //dd($images);
            foreach ($images as $image) {
                
                $image_name = $image->getClientOriginalName();

                $service->image_src = 'images/'.$image_name;

                $image->move('images', $image_name);
            }
            
        }

        $service->save();

        Session::flash('service_added', 'Service successfully added');
        return redirect('admin/services');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $service = Service::findorfail($id);

        return view('admin.services.edit', compact('service', $service));
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

        $service = Service::findorfail($id);

        $this->validate($request, [

            'name'=>'required',
            'description'=>'required'
            ]);

        $service->name = $request->name;
        $service->description = $request->description;

        if($images = $request->file('image_src')){
            //dd($images);

            foreach ($images as $image) {
                //dd($image);
                $image_name = $image->getClientOriginalName();

                $service->image_src = 'images/'.$image_name;

                $image->move('images', $image_name);
            }
            
        }
        //dd($service);
        $service->save();

        Session::flash('service_update','Service successfully updated');

        return redirect('admin/services');
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
