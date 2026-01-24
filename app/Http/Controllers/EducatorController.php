<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EducatorController extends Controller
{
    public function index()
    {
        $query = User::whereHas('roles', function ($query) {
            $query->where('name', 'Educador');
        });

        // Find the coordinator (assuming there is only one active coordinator for now)
        $coordinator = (clone $query)->where('position', 'LIKE', '%Coordenador%')->first();

        // Get other educators, excluding the coordinator if found
        $educators = $query->when($coordinator, function ($q) use ($coordinator) {
            return $q->where('id', '!=', $coordinator->id);
        })->paginate(10); 

        return view('educators.index', compact('educators', 'coordinator'));
    }
}