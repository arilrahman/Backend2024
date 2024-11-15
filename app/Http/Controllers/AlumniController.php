<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;

class AlumniController extends Controller
{
    // Menampilkan semua data alumni
    public function index() {
        $alumnis = Alumni::all();
        return response()->json([
            'msg' => 'Get all REsource',
            'data' => $alumnis
        ], 200);
    }

    // Menambahkan data alumni baru
    public function store(Request $request) {
        $input = [
            'name' => $request->nama,
            'phone' => $request->no,
            'address' => $request->alamat,
            'graduation_year' => $request->lulus,
            'status' => $request->status,
            'company_name' => $request->kantor,
            'position' => $request->pos
        ];

        $alumni = Alumni::create($input);

        return response()->json([
            'msg' => 'Resource added successfully',
            'data' => $alumni
        ], 201);
    }

    // Menampilkan data alumni berdasarkan ID
    public function show($id) {
        $alumni = Alumni::find($id);

        if ($alumni) {
            return response()->json([
                'msg' => 'Get Resource by ID',
                'data' => $alumni
            ], 200);
        } else {
            return response()->json([
                'msg' => 'Resource not found'
            ], 404);
        }
    }

    // Mengupdate data alumni
    public function update(Request $request, $id) {
        $alumni = Alumni::find($id);

        if ($alumni) {
            $input = [
                'name' => $request->nama,
                'phone' => $request->no,
                'address' => $request->alamat,
                'graduation_year' => $request->lulus,
                'status' => $request->status,
                'company_name' => $request->kantor,
                'position' => $request->pos
            ];

            $alumni->update($input);

            return response()->json([
                'msg' => 'Resource updated successfully',
                'data' => $alumni
            ], 200);
        } else {
            return response()->json([
                'msg' => 'Resource not found'
            ], 404);
        }
    }

    // Menghapus data alumni
    public function destroy($id) {
        $alumni = Alumni::find($id);

        if ($alumni) {
            $alumni->delete();

            return response()->json([
                'msg' => 'Resource is deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'msg' => 'Resource not found'
            ], 404);
        }
    }

    // Mendapatkan data alumni by name
    public function search($name) {
        $alumnis = Alumni::where('name', 'LIKE', '%' . $name . '%')->get();
    
        if ($alumnis->isNotEmpty()) {
            return response()->json([
                'msg' => 'Get searched resource',
                'data' => $alumnis
            ], 200);
        } else {
            return response()->json([
                'msg' => 'Resource not found'
            ], 404);
        }
    }
    
    // Mendapatkan data alumni dengan status fresh graduate
    public function freshGraduate() {
        $alumnis = Alumni::where('status', 'fresh-graduate')->get();
    
        if ($alumnis->isNotEmpty()) {
            return response()->json([
                'msg' => 'Get searched resource',
                'data' => $alumnis
            ], 200);
        } else {
            return response()->json([
                'msg' => 'Resource not found'
            ], 404);
        }
    }
    
    // Mendapatkan data alumni dengan status employed
    public function employed() {
        $alumnis = Alumni::where('status', 'employed')->get();
    
        if ($alumnis->isNotEmpty()) {
            return response()->json([
                'msg' => 'Get searched resource',
                'data' => $alumnis
            ], 200);
        } else {
            return response()->json([
                'msg' => 'Resource not found'
            ], 404);
        }
    }
    
    // Mendapatkan data alumni dengan status unemployed
    public function unemployed() {
        $alumnis = Alumni::where('status', 'unemployed')->get();
    
        if ($alumnis->isNotEmpty()) {
            return response()->json([
                'msg' => 'Get searched resource',
                'data' => $alumnis
            ], 200);
        } else {
            return response()->json([
                'msg' => 'Resource not found'
            ], 404);
        }
    }
}    