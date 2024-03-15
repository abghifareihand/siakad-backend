<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $studentId = $user->id; // Mengasumsikan id pengguna adalah student_id

        // Mengambil jadwal berdasarkan student_id
        $schedules = Schedule::with('study', 'student')
            ->where('student_id', $studentId)
            ->get();

        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Schedule data successfully retrieved.',
            'data' => $schedules,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
