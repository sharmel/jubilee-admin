<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Vendor;
use App\Vendor_Service;
use App\Contact;
use App\Location;
use App\Vendor_Image;
use Illuminate\Support\Facades\Session;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors  = Vendor::all();

        return view('admin.vendors.index', compact('vendors', $vendors));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $services = Service::pluck('name', 'id');

        return view('admin.vendors.create', compact('services', $services));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->'firstname';
        // $request->get('firstname');
        // return $request->all();
        // Vendor::create($request->all());

        $this->validate($request, [

            'firstname'=>'required',
            'lastname'=>'required',
            'username'=>'required',
            'services'=>'numeric',
            'email'=>'email',
            //'phone_number'=>'numeric',
            'street_number'=>'numeric',
            'street_name'=>'required',
            'city'=>'required',
            'post_code'=>'required',
            'image'=>'image',
            'image'=>'required'
            ]);

        $vendor_data = new Vendor;
        $vendor_data->first_name = $request->firstname;
        $vendor_data->last_name = $request->lastname;
        $vendor_data->username = $request->username;
        
        $vendor_data->save();

        //$vendor_id = Vendor::create($request->all());

        $vendor_service_data = new Vendor_Service;
        $vendor_service_data->vendor_id = $vendor_data->id;
        $vendor_service_data->service_id = $request->services;

        $vendor_service_data->save();

        $contact_data = new Contact;
        $contact_data->vendor_id = $vendor_data->id;
        $contact_data->email = $request->email;
        $contact_data->phone_number = $request->phone_number;

        $contact_data->save();

        $location_data = new Location;

        $location_data->contacts_id = $contact_data->id;
        $location_data->street_number = $request->street_number;
        $location_data->street_name = $request->street_name;
        $location_data->city = $request->city;
        $location_data->post_code = $request->post_code;
        
        $location_data->save();

        $image_data = new Vendor_Image;

        if($images = $request->file('image')){
            //dd($images);
            foreach ($images as $image) {
                
                $image_name = $image->getClientOriginalName();

                $image_data->vendor_id = $vendor_data->id;
                $image_data->image_path = 'images/'.$image_name;

                $image->move('images', $image_name);

                $image_data->save();
            }
            
        }

        //dd($image->getClientOriginalName());
        //dd($image->getClientSize());

        Session::flash('vendor_added', 'Vendor successfully added');
        return redirect('admin/vendors');
       
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
        $vendor = Vendor::findorfail($id);
        return view('admin.vendors.show', compact('vendor',$vendor));
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
        $vendor = Vendor::findorfail($id);
        $contact = Contact::findorfail($id);
        $services = Service::pluck('name', 'id');

        $vendor['email'] = $contact['email'];
        $vendor['phone_number'] = $contact['phone_number'];

        $location = Location::findorfail($contact->id);

        $vendor['street_name'] = $location['street_name'];
        $vendor['street_number'] = $location['street_number'];
        $vendor['city'] = $location['city'];
        $vendor['post_code'] = $location['post_code'];
        
        foreach ($vendor->services as $key => $value) {
            
            $vendor['service_id'] = $value->id;
        }
        //dd($location);
        //dd($vendor['services']);
        return view('admin.vendors.edit', compact('vendor','services'));
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

        $vendor = Vendor::findorfail($id);
        $service = Vendor_Service::findorfail($id);
        $contact = Contact::findorfail($id);
        $location = Location::findorfail($contact->id);
//dd($service);
//dd($request->all());

        $vendor['first_name'] = $request->first_name;
        $vendor['last_name'] = $request->last_name;
        $vendor['username'] = $request->username;

        $vendor->save();

        //$service['vendor_id'] = $id;
        $service['service_id'] = $request->service_id;

        $service->save();

        $contact['email'] = $request->email;
        $contact['phone_number'] = $request->phone_number;
        
        $contact->save();

        $location['street_number'] = $request->street_number;
        $location['street_name'] = $request->street_name;
        $location['city'] = $request->city;
        $location['post_code'] = $request->post_code;

        $location->save();

        Session::flash('vendor_update', 'Vendor successfully updated');

        return redirect('admin/vendors');

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
