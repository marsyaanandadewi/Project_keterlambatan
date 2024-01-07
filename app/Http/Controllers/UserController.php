<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = $request->only(['email', 'password']);

        if (Auth::attempt($user)){
            if (Auth::user()->role == 'admin'){
                session('checkIsAdmin',true);
                return redirect()->route('home')->with('success', 'Login berhasil!');
            } elseif (Auth::user()->role == 'ps') {
                session('checkIsAdmin',false);
                return redirect()->route('late.index')->with('success', 'Login berhasil!');
            }
            
        }else{
            return redirect()->back()->with('failed', 'Prosses login gagal, silahkan coba lagi!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('name','ASC')->simplePaginate(5);
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'role'=>'required',
        ]);
        User::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'role' =>$request->role,
            'password'=> Hash::make(substr($request->name, 0, 3). substr($request->email,0,3)),
        ]);
        return redirect()->route('user.index')->with('success','berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
       


    }

    /**
     * Update the specified resource in storage.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);
    
        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);
    
        return redirect()->route('user.index')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }

    // public function dashboardAdmin(Request $request)
    // {
    //     $rombel = Rombel::count();
    //     $Rayon = Rayon::count();
    //     $student = Student::count();
    //     $admin = User::where('role', 'admin')->count();
    //     $ps = User::where('role', 'ps')->count();

    //     return view('admin.index', compact('rombel', 'rayon', 'student', 'admin', 'ps'));
    // }

    // public function dashboardPs(Request $request)
    // {
    //     $rayon = Rayon::where('user_id', Auth::user()->id)->first();
    //     $student = Student::where('rayon_id', $rayon->id)->count();
    //     return view('ps_index', compact('student', 'rayon'));
    // }

}
