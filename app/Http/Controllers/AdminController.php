<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Business;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function home(){
        $data = array();
        $businesses = Business::all()->load('category');

        return view('home')->with('business', $businesses);
    }

    public function login(Request $request){


        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $validated['email'])->first();
        $business = Business::all()->load('category');
        if ($user) {
            $check = Hash::check($validated['password'], $user->password);
            if ($check){
                return view('home')->with(['user'=> $user, 'business' => $business]);
            }else{
                return redirect('/login');
            }
        }else{
            return redirect('/login');
        }
    }

    public function register(Request $request){

        $validated = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = new User;
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->save();

        return view('auth.login');

    }

    public function addBusiness(){
        $category = Category::all();
        return view('addBusiness')->with('categories', $category);
    }

    public function createCategory(Request $request){
        $validated = $request->validate([
            'name' => 'required|string'
        ]);

        $category = new Category;
        $category->name = $validated['name'];
        $category->save();

        return redirect('/');

    }

    public function createBusinessListing(Request $request){

        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'website' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'category.*' => 'required|string'
        ]);

        $business = new Business;
        $business->name = $validated['name'];
        $business->description = $validated['description'];
        $business->website_url = $validated['website'];
        $business->email = $validated['email'];
        $business->phone = $validated['phone'];
        $business->address = $validated['address'];
        $business->user_id = 1; //Auth::user();
        $business->save();

        $business->category()->attach($validated['category']);
        return redirect('/');

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

    public function getBusinessListings(){
        $business = Business::all();

    }

    public function deleteBusinessListing($id){
        $business = Business::find($id);
        $business->delete();
    }

    public function getEachBusinessListing($id){

        $business = Business::find($id)->load('category');
        return view('eachBusiness')->with('business', $business);


    }

    public function searchapi(Request $request){

        $business = Business::where('name','LIKE','%'.$request->data.'%')
                        ->orWhere('description','LIKE','%'.$request->data.'%')
                        ->load('category');

        if(count($business) > 0){
            return response()->json([
                'message' => "Search Results",
                'data' => $business
            ], 200);

        }else{
            return response()->json([
                'message' => "No Details found. Try to search again!",
                'error' => true
            ], 400);

        }

    }
        public function search(Request $request){

            $business = Business::where('name','LIKE','%'.$request->data.'%')
                            ->orWhere('description','LIKE','%'.$request->data.'%')
                            ->get();

            if(count($business) > 0){
                return view('home')->with('business',$business->load('category'));
            }else{
                return view('home');
            }
        }

}
