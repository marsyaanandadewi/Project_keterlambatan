<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Late;
use App\Models\student;
use App\Models\rayon;
use App\Exports\ExportExcel;
use Illuminate\Http\Request;
use Excel;
use PDF;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LateController extends Controller
{
    // Controller
public function index(Request $request)
{
    $late = Late::with('student');

    // Tambahkan kondisi pencarian
    if ($request->has('late')) {
        $late->whereHas('student', function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->input('late') . '%');
        });
    }

    $late = $late->get();
    $s = Student::all();

    return view('late.index', compact('late', 's', 'request')); // Sertakan variabel $request di sini
}

    // public function index()
    // {

    //     $late = late::with('student')->get();
    //     $s = student::all();
    
    //     return view('late.index', compact('late', 's'));
    // }
    
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'date_time'=> 'required',
            'information'=> 'required',
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = time().'_'.$request->student_id.'.'.$request->bukti->extension();
        $request->bukti->move(public_path('uploads'), $image);

        Late::create([
            'student_id' => $request->student_id,
            'date_time' => $request->date_time,
            'information' => $request->information,
            'bukti' => $image,
        ]);

        return redirect()->route('late.index')->with('success', 'Berhasil menambahkan data keterlambatan!');
    }

    public function rekap()
    {
        $rekap = Late::selectRaw('lates.student_id as student_id, users.name as students_name, COUNT(*) as total_late, MAX(date_time) as lates_late_date')
            ->join('users', 'student_id', '=', 'users.id')
            ->groupBy('student_id', 'users.name')
            ->get();

        $student = Late::with('student')->simplePaginate(5);
        return view('late.rekap', compact('rekap'));
    }

    public function show($student_id)
    {
        $siswa = Student::findOrFail($student_id);
    
        // Retrieve late records for the selected student
        $late= Late::where('student_id', $siswa->id)->with('student')->get();
        $groupedlate= $late->groupBy('student.nis'); 
    
        return view('late.show', compact('late',));

    }
      
        
    public function exportexcel()
    {
        $file_name = 'data_keterlambatan'.'.xlsx';
        return Excel::download(new ExportExcel, $file_name);
    }

    public function create()
    {
       $student = student::all();
       return view ('late.create', compact('student'));
    }
    // public function pdf($id){
    //     $late = Late::with('user')->where('id',$id)->get();
    //     $pdf = PDF::loadView('late.pdf',["late" => $late]);
    //     return $pdf->download('late_report.pdf');
    // }

    public function destroy($id)
    {
        Late::where('id', $id)->delete();

        return redirect()->route('late.index')->with('success', 'Berhasil menghapus data kekterlambatan');
    }

    public function edit(Late $late, $id)
    {
        $late = late::find($id);
        $student = student::all();

        return view('late.edit', compact('late', 'student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required',
            'date_time'=> 'required',
            'information'=> 'required',
        ]);

        Late::where('id', $id)->update([
            'student_id' => $request->student_id,
            'date_time' => $request->date_time,
            'information' => $request->information,
        ]);

        return redirect()->route('late.index')->with('success', 'Berhasil menambahkan data keterlambatan!');
    }

    public function pdf($id)
    {
        $late = Late::with('student')->where('student_id', $id)->get();
        
        // Hitung jumlah keterlambatan
        $jumlahKeterlambatan = $late->count(); // Atau sesuai logika bisnis Anda
    
        $pdf = PDF::loadView('pdf', ["late" => $late, "jumlahKeterlambatan" => $jumlahKeterlambatan]);
        return $pdf->download('surat_keterlambatan.pdf');
}

// public function keterlambatan()
//     {
//         $late = Late::with('student')->get();
//         return view('ps.late.keterlambatan', compact('late', 'rayon', 'student'));
//     }


}
