<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Route;

class StudentController extends Controller
{
  public function index() {
    $students = Student::all();

    $data = [
        'message' => 'get all students',
        'data' => $students
    ];

    # mengirim data (json) dan kode 200
return response()->json($data, 200);


  }
  # membuat method store
public function store(Request $request) {
    # menangkap data request
    $input = [
    'nama' => $request->nama,
    'nim' => $request->nim,
    'email' => $request->email,
    'jurusan' => $request->jurusan
    
    ];
    # menggunakan model Student untuk insert data
$student = Student :: create($input);

$data = [
    'message' => 'Student is created succesfully',
    'data' => $student,
    
];

// mengembalikan data (json) dan kode 201
return response()->json($data, 201);
}
public function update(Request $request, $id) {
    $student = Student::find($id);

    if ($student) { // jika student ditemukan
        $input = [
            'nama' => $request->nama ?? $student->nama,
            'nim' => $request->nim ?? $student->nim,
            'email' => $request->email ?? $student->email,
            'jurusan' => $request->jurusan ?? $student->jurusan,
        ];
        $student->update($input);

        $data = [
            "message" => 'Student is updated successfully',
            "data" => $student,
        ];

        return response()->json($data, 200);
    } else { // jika student tidak ditemukan
        $data = [
            'message' => 'Student not found'
        ];
        return response()->json($data, 404);
    }
}


public function destroy($id) {
    // Cari student berdasarkan id
    $student = Student::find($id);

    // Jika student tidak ditemukan, kembalikan respons error
    if (!$student) {
        return response()->json([
            'message' => 'Student not found'
        ], 404);
    }

    try {
        // Hapus student
        $student->delete();

        // Kembalikan respons sukses
        return response()->json([
            'message' => 'Student deleted successfully'
        ], 200);
    } catch (\Exception $e) {
        // Tangani error dan kembalikan pesan error
        return response()->json([
            'message' => 'Failed to delete student',
            'error' => $e->getMessage()
        ], 500);
    }
}


}