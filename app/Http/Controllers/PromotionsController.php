<?php

namespace App\Http\Controllers;

use App\Models\Promotions;
use App\Models\Student;
use App\Models\Grade;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Repository\PromotionRepositoryInterface;


class PromotionsController extends Controller
{
    protected $p_student;
    public function __construct(PromotionRepositoryInterface $p_student)
    {
        $this->p_student=$p_student;
    }


    public function index()
    {
        return $this->p_student->index();

    }

    public function create()
    {
        return $this->p_student->create();

    }

    public function store(Request $request)
    {
        return $this->p_student->store($request);

    }


 
    
    public function destroy(Request $request)
    {
        return $this->p_student->destroy($request);
    }
}
