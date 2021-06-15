<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function login(Request $request){


        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $validated['email'])->first();

        if ($user) {
            $check = Hash::check($validated['password'], $user->password);
            if ($check){
                return 'yes';
            }else{
                return 'yes';
            }
        }else{
            return 'yes';
        }
    }

    public function createCategory(Request $request){
        $validated = $request->validate([
            'name' => 'required|string'
        ]);

        $category = new Category;
        $category->name = $validated['name'];
        $category->save();

    }

    public function createBusinessListing(Request $request){

        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'website' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);



        $business = new Business;
        $business->name = $validated['name'];
        $business->description = $validated['description'];
        $business->website = $validated['website'];
        $business->email = $validated['email'];
        $business->phone = $validated['phone'];
        $business->address = $validated['address'];
        $business->save();

    }

    public function updateBusinessListing(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'website' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);



        $business = Business::find($id);
        $business->name = $validated['name'];
        $business->description = $validated['description'];
        $business->website = $validated['website'];
        $business->email = $validated['email'];
        $business->phone = $validated['phone'];
        $business->address = $validated['address'];
        $business->save();
    }

    public function getBusinessListings(){}

    public function deleteBusinessListing($id){
        $business = Business::find($id);
        $business->delete();
    }

    public function getBusinessListingbyCateogory(Request $request){



    }

    public function search(Request $request){}

}
