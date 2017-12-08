<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Auto;
use Session;

class AutoController extends Controller
{
    
    public function addAuto()
    {
        return view('pages.autoAdd');
    }
    public function listAuto()
    {
        $Autos = Auto::all();
        return view('pages.autoList', ['autos' => $Autos]);
    }
    public function postAddAuto(Request $request)
    {
        $Request = $request->all();
        unset($Request['scheme_img']);
        $Auto = Auto::create($Request);
        if($request->hasFile('scheme_img'))
        {
            $dir = public_path() . '/img/auto/' . $Auto->id;
            foreach ($request->file('scheme_img') as $img) {
                $img->move($dir, $img->getClientOriginalName());
            }
        }
        return ['name' => $Auto->firm];
    }
    public function editAvto($id)
    {
        $Auto = Auto::find($id);
        return view('pages.autoEdit', ['auto' => $Auto]);
    }
    public function postEditAvto(Request $request)
    {
        $Request = $request->all();
        $Auto = Auto::find($Request['id']);
        $Auto->update($Request);
        return redirect('/list-auto');
    }
    public function deleteAvto(Request $request)
    {
    	$Request = $request->all();
    	$Auto = Auto::find($Request['id']);
    	$Auto->delete();
    }
    public function postEditAuto(Request $request)
    {
    	$Request = $request->all();
    	$Auto = Auto::find($Request['id']);
    	$Auto->update($Request);
    }
}
