<?php

namespace App\Http\Controllers;


use App\Models\Student;
use App\Models\Teacher;
use App\Models\Gender;
use App\Models\Specializations;
use App\Models\Grade;
use App\Models\Sections;
use App\Models\Classrooms;
use App\Models\Type_Blood;
use App\Models\My_Parent;
use App\Models\Image;
use App\Models\Promotions;

use Illuminate\Support\Facades\Storage;
use DB;
use App\Models\Nationalitie;
use Illuminate\Support\Facades\Hash;



use Illuminate\Http\Request;
use App\Repository\StudentGraduateRepositoryInterface;

class GraduatedController extends Controller
{

    protected $graduate;
    public function __construct(StudentGraduateRepositoryInterface $graduate)
    {
        $this->graduate=$graduate;
    }

    /****************************************************************************************************************************************/
    
    public function index()
    {
        return $this->graduate->index();

    }
    /****************************************************************************************************************************************/

    public function create()
    {

        return $this->graduate->create();

    }

    public function store(Request $request)
    {

        return $this->graduate->store($request);

    }

    /****************************************************************************************************************************************/
 

    public function update(Request $request)
    {
        return $this->graduate->update($request);

    }
    /****************************************************************************************************************************************/


    public function destroy(Request $request)
    {
        return $this->graduate->destroy($request);

    }



}
