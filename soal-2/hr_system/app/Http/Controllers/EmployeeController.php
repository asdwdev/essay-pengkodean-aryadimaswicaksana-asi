<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;


class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nomor' => 'required|string|max:15|unique:employees,nomor',
            'nama' => 'required|string|max:150',
            'jabatan' => 'nullable|string',
            'talahir' => 'nullable|date',
            'photo' => 'nullable|image',
        ]);

        try {
            if ($request->hasFile('photo')) {
                $path = $request->file('photo')->store('photos', 'public');
                $data['photo_upload_path'] = Storage::disk('s3')->url($path);
            }

            $data['created_on'] = now();
            $data['created_by'] = auth()->user()->name ?? 'system';

            $employee = Employee::create($data);

            Redis::set('emp_' . $employee->nomor, $employee->toJson());

            return response()->json($employee);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Duplicate nomor.'], 422);
        }
    }
}
