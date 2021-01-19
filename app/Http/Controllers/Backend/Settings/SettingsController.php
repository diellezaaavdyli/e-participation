<?php

namespace App\Http\Controllers\Backend\Settings;
use App\Models\Social;
use App\Models\Content;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class SettingsController extends Controller
{
    public function index()
    {
        return view('backend.settings.settings');
    }
    public function socials(Request $request){
        $datas = $request->all();
        $facbook;
       
        if ($request->input('facebook'))
            {
                $facbook = $request->input('facebook');
                $social = Social::where('name', 'facebook')->first();
                if(!$social){
                    $social = new Social;
                    $social->name = 'facebook';
                    $social->url =  $request->input('facebook');
                    $social->save();
                } else {
                    $social->url =  $request->input('facebook');
                    $social->update();
                }
            }
            if ($request->input('twitter'))
            {
                $facbook = $request->input('twitter');
                $social = Social::where('name', 'twitter')->first();
                if(!$social){
                    $social = new Social;
                    $social->name = 'twitter';
                    $social->url =  $request->input('twitter');
                    $social->save();
                } else {
                    $social->url =  $request->input('twitter');
                    $social->update();
                }
            }
            if ($request->input('instagram'))
            {
                $facbook = $request->input('instagram');
                $social = Social::where('name', 'instagram')->first();
                if(!$social){
                    $social = new Social;
                    $social->name = 'instagram';
                    $social->url =  $request->input('instagram');
                    $social->save();
                } else {
                    $social->url =  $request->input('instagram');
                    $social->update();
                }
            }
            if ($request->input('youtube'))
            {
                $facbook = $request->input('youtube');
                $social = Social::where('name', 'youtube')->first();
                if(!$social){
                    $social = new Social;
                    $social->name = 'youtube';
                    $social->url =  $request->input('youtube');
                    $social->save();
                } else {
                    $social->url =  $request->input('youtube');
                    $social->update();
                }
            }
            if ($request->input('linkedin'))
            {
                $facbook = $request->input('linkedin');
                $social = Social::where('name', 'linkedin')->first();
                if(!$social){
                    $social = new Social;
                    $social->name = 'linkedin';
                    $social->url =  $request->input('linkedin');
                    $social->save();
                } else {
                    $social->url =  $request->input('linkedin');
                    $social->update();
                }
            }
        return redirect()->back();
    }

    public function content(Request $request)
    {
        $content = Content::where('name', $request->name)->first();
        if(!$content){
            $content = new Content;
            $content->name = $request->name;
            $content->description = $request->description;
            if ($request->file('image')) {
                $image = $request->file('image');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
                $content->image = $name;
              }
        } else {
            $content->description = $request->description;
            if ($request->file('image')) {
                $image = $request->file('image');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
                $content->image = $name;
              }
        }
        $content->save();
        return redirect()->back();
    }
}
