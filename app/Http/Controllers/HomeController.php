<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Data;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function insert()
    {
        $data = DB::table('data')->select()->get();
        return view('alldata',compact('data'));
    }

    public function adddata()
    {
        return view('insert');
    }

    public function insertdata(Request $request)
    {
        $request->validate([
            'name' => 'required | max:255',
            'email' => 'required | email',
            'image' => 'required',
            'mobile_no' => 'required | digits:10 | numeric',
            'gender' => 'required',
            'city' => 'required'  
        ]);

        $imagename = $request->image->getClientOriginalName();

        if($request->image)
        {
            $data = $request->image->move(public_path('image'),$imagename);
        }

        DB::table('data')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $imagename,
            'mobile_no' => $request->mobile_no,
            'gender' => $request->gender,
            'city' => $request->city
        ]);

        return redirect('/insert');

    }

    public function edit($id)
    {
        $data = DB::table('data')->select()->where('id','=',$id)->get();
        return view('edit',compact('data'));
    }

    public function delete($id)
    {
        DB::table('data')
            ->where('id', $id)
            ->delete();
        return redirect('/insert');
    }

    public function updatedata(Request $request)
    {
        $request->validate([
            'name' => 'required | max:255',
            'email' => 'required | email',
            'mobile_no' => 'required | digits:10 | numeric',
            'gender' => 'required',
            'city' => 'required'  
        ]);

        if($request->image)
        {

            $request->validate([
                'image' => 'required',
            ]);

            $imagename = $request->image->getClientOriginalName();

            $data = $request->image->move(public_path('image'),$imagename);

            DB::table('data')
                ->where('id', $request->id)
                ->update(['image' => $imagename]);
        }

        DB::table('data')
            ->where('id', $request->id)
            ->update(['name' => $request->name,'email' => $request->email, 'mobile_no' => $request->mobile_no, 'gender' => $request->gender, 'city' => $request->city]);

        return redirect('/insert');
    }

    public function ajaxdata()
    {
        $data = DB::table('data')->select()->get();
        return view('ajaxdata',compact('data'));
    }

    public function ajaxinsert()
    {
        return view('ajaxinsert');
    }

    public function ajaxadd(Request $request)
    {

        return response()->json(['success'=>'Got Simple Ajax Request.','error'=>$request]);
    }
}
