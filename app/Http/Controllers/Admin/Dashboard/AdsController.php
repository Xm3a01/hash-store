<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Ads;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdsController extends Controller
{
    
    public function index()
    {
        $ads = Ads::paginate(100);
        return view('admins.dashboard.ads.index' , ['ads' => $ads]);
    }

    
    public function create()
    {
        return view('admins.dashboard.ads.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request , [
            'title' => 'required',
            'description' => 'required'
        ]);

        $ad = Ads::create($request->except('image'));

        if($request->hasFile('image')) {
            $ad->addMedia($request->image)->preservingOriginal()->toMediaCollection('ads');
       }

       \Session::flash('success' , 'تم حفظ الاعلان بنجاح');
        return redirect()->route('ads.index');
    }

   
    public function edit(Ads $ad)
    {
        return view('admins.dashboard.ads.edit' , ['ad' => $ad]);
    }

   
    public function update(Request $request,Ads $ad)
    {
        $data = $request->except('image');
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now(); 
        $ad->update($data);

        if($request->hasFile('image')) {
            $ad->clearMediaCollection('ads');
            $ad->addMedia($request->image)->preservingOriginal()->toMediaCollection('ads');
       }

       \Session::flash('success' , 'تم تعديل الاعلان بنجاح');
        return redirect()->route('ads.index');
    }

    
    public function destroy(Ads $ad)
    {
        $ad->clearMediaCollection('ads');
        $ad->delete();

        \Session::flash('success' , 'تم حذف الاعلان بنجاح');
        return redirect()->route('ads.index');

    }
}
