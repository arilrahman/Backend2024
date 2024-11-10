<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Route;

class StudentController extends Controller
{
    public function index()
    {

        

        $students = Student::all();

        if (count($students)){
            $data = [
                "msg" => "get all students",
                "data" => $students
            ];
        }
        else{
            $data = [
                "msg"=> "student empty",
                
            ];
        }

        
        $data = [
            'message' => 'get all students',
            'data' => $students
        ];

        # mengirim data (json) dan kode 200
        return response()->json($data, 200);
    }
    
    # membuat method storeI
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nama" => "required",
           'nim' => 'numeric|required',
'email' => 'email|required',
'jurusan' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'msg'=> 'validator errors',
                'wrror' => $validator->errors()
                ],422);

        
$student = Student::create($request->all());


$data = [
    'msg'=> 'student is created sucess',
    'data'=> $student
];
        
return response()->json($data,201);
        }
        # menangkap data request
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan

        ];
    
        # menggunakan model Student untuk insert data
        $student = Student::create($input);

        $data = [
            'message' => 'Student is created succesfully',
            'data' => $student,

        ];
    
        // mengembalikan data (json) dan kode 201
        return response()->json($data, 201);
        }
    
    
    public function update(Request $request, $id)
    {
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


    public function destroy($id)
    {
        # cari id student yang ingin dihapus
        $student = Student::find($id);

        if ($student) {
            # hapus student tersebut
            $student->delete();

            $data = [
                'message' => 'Student is deleted'

            ];

            # mengembalikan data (json) dan kode 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found'
            ];
            return response()->json($data, 404);
        }
    }


    # cari id student yang ingin didapatkan
    public function show($id)
    {

        $student = Student::find($id);

        if ($student) {
            $data = [
                'message' => 'Get detail student',
                'data' => $student,

            ];

            # mengembalikan data (json) dan kode 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found',

            ];

            # mengembalikan data (json) dan kode 404
            return response()->json($data, 404);
        }
    }
}
