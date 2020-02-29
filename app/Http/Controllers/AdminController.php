<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use App\User;
use File;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::where('role', 'admin')
                    ->orWhere('role', 'operasional')
                    ->get(); 

        return view('admin.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [ 
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'photo' =>  ['mimes:jpeg,png|max:10240'],
            'role' =>  ['required', 'string'],
        ]);

        if ($request->hasFile('photo')) { 
            $photo = $this->savePhoto($request->file('photo'));
        }

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'photo' => $photo,
            'role' => $request->get('role'),
        ]);

        return redirect()->route('admin.index');

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
        $data = User::findOrFail($id); 
        return view('admin.edit', compact('data'));
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
        $data = User::findOrFail($id);
        $this->validate($request, [ 
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'photo' =>  ['mimes:jpeg,png|max:10240'],
            'role' =>  ['required', 'string'],
        ]);
        $update = $request->only('name', 'email', 'role');
        if ($request->hasFile('photo')) { 
            $update['photo'] = $this->savePhoto($request->file('photo'));
            if ($data->photo !== '') $this->deletePhoto($data->photo);
        }
        $update['password'] = Hash::make($request->get('password'));
        $data->update($update);
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id); 
        if ($data->photo !== '') 
            $this->deletePhoto($data->photo); 
        $data->delete(); 
        return redirect()->route('admin.index');

    }

    protected function savePhoto(UploadedFile $photo) 
    { 
        $fileName = Str::random(40) . '.' . $photo->guessClientExtension(); 
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img'; 
        $photo->move($destinationPath, $fileName); 
        return $fileName; 
    }
    public function deletePhoto($filename) { 
        $path = public_path() . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . $filename; 
        return File::delete($path); 
    }

}
