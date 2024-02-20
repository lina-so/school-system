<?php

namespace App\Http\Controllers;

use App\Models\Fee_invoice;
use Illuminate\Http\Request;

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
use App\Models\StudentAccount;
use App\Models\Fee;



use Illuminate\Support\Facades\Storage;
use DB;
use App\Models\Nationalitie;
use Illuminate\Support\Facades\Hash;


class FeeInvoiceController extends Controller
{
   
    /*********************************************************************************/
    public function index()
    {
        $Fee_invoices = Fee_invoice::all();
        $Grades = Grade::all();
        return view('pages.Fees_Invoices.index',compact('Fee_invoices','Grades'));
    }

    /*********************************************************************************/

   
    public function create()
    {
        //
    }

      /*********************************************************************************/

    public function store(Request $request)
    {

        DB::beginTransaction();

        try {

            
                // حفظ البيانات في جدول فواتير الرسوم الدراسية
                $Fees = new Fee_invoice();
                $Fees->invoice_date = date('Y-m-d');
                $Fees->student_id = $request->student_id;
                $Fees->Grade_id = $request->Grade_id;
                $Fees->Classroom_id = $request->Classroom_id;
                $Fees->fee_id = $request->fee_id;
                $Fees->amount = $request->amount;
                $Fees->description = $request->description;
                $Fees->save();

                // حفظ البيانات في جدول حسابات الطلاب
                $StudentAccount = new StudentAccount();
                $StudentAccount->date = date('Y-m-d');
                $StudentAccount->type = 'invoice';
                $StudentAccount->fee_invoice_id = $Fees->id;
                $StudentAccount->student_id = $request->student_id;
                $StudentAccount->Debit = $request->amount;
                $StudentAccount->credit = 0.00;
                $StudentAccount->description =  $request->description; 
                $StudentAccount->save();
            

            DB::commit();

            // toastr()->success(trans('messages.success'));
            return redirect()->route('Fees_Invoices.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    /*********************************************************************************/

    public function show($id)
    {
        $student = Student::findorfail($id);
        $fees = Fee::where('Classroom_id',$student->Classroom_id)->get();
        // dd($fees);
        return view('pages.Fees_Invoices.add',compact('student','fees'));
    }

      /*********************************************************************************/

      public function edit($id)
      {
          $fee_invoices = Fee_invoice::findorfail($id);
          $fees = Fee::where('Classroom_id',$fee_invoices->Classroom_id)->get();
          
          return view('pages.Fees_Invoices.edit',compact('fee_invoices','fees'));
      }

       /*********************************************************************************/

   
       public function update(Request $request)
       {
           DB::beginTransaction();
           try {
               // تعديل البيانات في جدول فواتير الرسوم الدراسية
               $Fees = Fee_invoice::findorfail($request->id);
               $Fees->fee_id = $request->fee_id;
               $Fees->amount = $request->amount;
               $Fees->description = $request->description;
               $Fees->save();
   
               // تعديل البيانات في جدول حسابات الطلاب
               $StudentAccount = StudentAccount::where('fee_invoice_id',$request->id)->first();
               $StudentAccount->Debit = $request->amount;
               $StudentAccount->description = $request->description;
               $StudentAccount->save();
               DB::commit();
   
            //    toastr()->success(trans('messages.Update'));
               return redirect()->route('Fees_Invoices.index');
           } catch (\Exception $e) {
               DB::rollback();
               return redirect()->back()->withErrors(['error' => $e->getMessage()]);
           }
       }

        /*********************************************************************************/

    public function destroy(Fee_invoice $fee_invoice)
    {
        //
    }
}
