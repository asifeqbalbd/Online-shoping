<?php

namespace App\Http\Controllers;

use App\Online;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Laravel\Socialite\Facades\Socialite;

use function Ramsey\Uuid\v1;

class SocialController extends Controller
{

    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }
    public function handleProviderCallback()
    {

        $user = Socialite::driver('github')->user();
        $d = $user->getId();
        $e =  $user->getEmail();
        $data = User::where('provider_id', $d)->where('email', $e)->first();
        if($data){
            auth()->login($data);
        }
        else{
            User::insert([
                'provider_id' => $user->getId(),
                'last_name' => $user->getNickname(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'provider_name' => 'github',
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ]);
            $data2 = User::where('provider_id', $d)->where('email', $e)->first();
            auth()->login($data2);
        }
        return redirect('/home');
    }

    // public function redirectToProviderGoogle()
    // {
    //     return Socialite::driver('google')->redirect();
    // }
    // public function handleProviderCallbackGoogle()
    // {

    //     $user = Socialite::driver('google')->user();
    //     $de = $user->getId();
    //     $em =  $user->getEmail();
    //     $data1 = User::where('provider_id', $de)->where('email', $em)->first();
    //     if($data1){
    //         auth()->login($data1);
    //     }
    //     else{
    //         User::insert([
    //             'provider_id' => $user->getId(),
    //             'last_name' => $user->getNickname(),
    //             'name' => $user->getName(),
    //             'email' => $user->getEmail(),
    //             'provider_name' => 'google',
    //             'email_verified_at' => Carbon::now(),
    //             'created_at' => Carbon::now(),
    //         ]);
    //         $data22 = User::where('provider_id', $de)->where('email', $em)->first();
    //         auth()->login($data22);
    //     }
    //     return redirect('/home');
    // }

    function Social(){
        return view('backend.social.social');
    }
    function SocialPost(Request $request){
        Online::insert([
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'github' => $request->github,
            'pinterest' => $request->pinterest,
            'linkedin' => $request->linkedin,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('session','Social Media Added Successfully');
    }
    function SocialView(){
        $viewOnline = Online::paginate(3);
        return view('backend/social/socialview', compact('viewOnline'));
    }
    function SocialPostEdit($id){
        $alldata = Online::findOrFail($id);
        session(['online_id' => $id]);
        return view('backend.social.socialEdit', compact('alldata'));
    }
    function SocialPostUpdate(Request $request){
        $id = $request->session()->get('online_id');
        Online::findOrFail($id)->update([
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'github' => $request->github,
            'pinterest' => $request->pinterest,
            'linkedin' => $request->linkedin,
        ]);
        return redirect('/Social/view')->with('update','Social Media Update Successfully');
    }
    function SocialPostDelete($id){
        Online::findOrFail($id)->delete();
        return redirect('/Social/view')->with('delete','Social Media delete Successfully');
    }
}
