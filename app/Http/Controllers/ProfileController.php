<?php

namespace App\Http\Controllers;

use App\Product;
use App\Profile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    function Profile(){
        return view('backend.profile.profile');
    }
    function ProfilePost(Request $request){
        $request->validate([
            'phone' => ['required', 'min:11', 'numeric'],
            'email' => ['required', 'email', 'unique:profiles'],
            'address' =>['required'],
            'sammary' => ['required', 'max:1000'],
            'copyright' =>['required', 'max:300'],
            'logo' =>['mimes:png,jpg,jpeg,gif', 'required', 'max:10000'],
            [
                'phone.min' => "Minimum 11 Characters Data",
                'email.email' => "Pleces Valide Email Address",
                'logo.max' =>"Maximum 10000kb file Uplode",
            ]
        ]);

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $logo = time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(125, 35)->save(public_path('/img/logo/'. $logo));
            Profile::insert([
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'sammary' => $request->sammary,
                'copyright' => $request->copyright,
                'logo' => $logo,
                'created_at' => Carbon::now(),
            ]);
            return back()->with('profile', 'Profile Added Successfully');
        }
    }
    function ProfileView(){
        $la = Profile::orderBy('email', 'asc')->paginate(3);
        return view('backend.profile.profileView', compact('la'));
    }
    function ProfileEdit($id){
        $profileE = Profile::findOrFail($id);
        session(['profile_id' => $id]);
        return view('backend/profile/profileEdit', compact('profileE'));
    }
    function ProfilePostUpdate(Request $request){
        $request->validate([
            'phone' => ['required', 'min:11', 'numeric'],
            'email' => ['required', 'email', 'unique:profiles'],
            'address' =>['required'],
            'sammary' => ['required', 'max:1000'],
            'copyright' =>['required', 'max:300'],
            'logo' =>['mimes:png,jpg,jpeg,gif', 'required', 'max:10000'],
            [
                'phone.min' => "Minimum 11 Characters Data",
                'email.email' => "Pleces Valide Email Address",
                'logo.max' =>"Maximum 10000kb file Uplode",
            ]
        ]);

        $id = $request->session()->get('profile_id');
        $old_profile = Profile::findOrFail($id);
        $old_img = $old_profile->logo;
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $logo1 = time().'.'.$image->getClientOriginalExtension();
            if (file_exists(public_path('img/logo/').$old_img)) {
                unlink(public_path('img/logo/').$old_img);
            }
            Image::make($image)->resize(125, 35)->save(public_path('/img/logo/'. $logo1));
            Profile::findOrFail($id)->update([
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'sammary' => $request->sammary,
                'copyright' => $request->copyright,
                'logo' => $logo1,
            ]);
        }
        return redirect('/profile/view')->with('update', 'Profile Update Successfully');
    }
    function ProfileDelete($id){
        Profile::findOrFail($id)->delete();
        return redirect('/profile/view')->with('delete', 'Profile Delete Successfully');
    }
}
