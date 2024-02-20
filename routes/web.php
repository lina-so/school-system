<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LocalizationController;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





// Auth::routes();



// Route::group(['middleware' => ['guest']], function () {

//     Route::get('/', function () {
//         return view('auth.login');
//     });

// });

Route::get("/", [App\Http\Controllers\HomeController::class, 'index'])->name('selection');


Route::group(['namespace' => 'Auth'], function () {

    Route::get("/login/{type}", [App\Http\Controllers\Auth\LoginController::class, 'loginForm'])->middleware('guest')->name('login_show');
    Route::post("/login", [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
    Route::get("/logout/{type}", [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

});

//==============================Translate all pages============================

Route::get("locale/{lange}", [LocalizationController::class, 'setLang'])->name('lang');




//==============================grade============================

    Route::resource('grade', App\Http\Controllers\GradeController::class);


Route::resource('classroom', App\Http\Controllers\ClassroomsController::class);

Route::resource('sections', App\Http\Controllers\SectionsController::class);


Route::resource('teachers', App\Http\Controllers\TeacherController::class);

Route::resource('students', App\Http\Controllers\StudentController::class);




/***********************        Promotion       ************************/

Route::resource('Promotion', App\Http\Controllers\PromotionsController::class);

/***********************        graduated       ************************/

Route::resource('graduated', App\Http\Controllers\GraduatedController::class);

/***********************        Fees       ************************/

Route::resource('Fees',  App\Http\Controllers\FeesController::class);

/***********************        Fees_Invoices       ************************/

Route::resource('Fees_Invoices',  App\Http\Controllers\FeeInvoiceController::class);

/***********************        receipt_students       ************************/

Route::resource('receipt_students', App\Http\Controllers\ReceiptStudentsController::class);

/***********************        ProcessingFee       ************************/

Route::resource('ProcessingFee', App\Http\Controllers\ProcessingFeeController::class);

// Route::resource('Payment_students', App\Http\Controllers\PaymentController::class);

/***********************        Attendance       ************************/

Route::resource('Attendance', App\Http\Controllers\AttendanceController::class);

/***********************        subjects       ************************/

Route::resource('subjects', App\Http\Controllers\SubjectController::class);

/***********************        Quizzes       ************************/

Route::resource('Quizzes', App\Http\Controllers\QuizzeController::class);

/***********************        questions       ************************/

Route::resource('questions', App\Http\Controllers\QuestionController::class);


/***********************        getclasses       ************************/

Route::get('/classes/{id}',[ App\Http\Controllers\SectionsController::class ,'getclasses']);




/***********************        OnlineClasse       ************************/

Route::resource('online_classes', App\Http\Controllers\OnlineClasseController::class);

Route::get('indirect_admin', [App\Http\Controllers\OnlineClasseController::class,'indirectCreate'])->name('indirect.create.admin');

Route::post('indirect_admin',[App\Http\Controllers\OnlineClasseController::class,'storeIndirect'])->name('indirect.store.admin');

Route::get('download_file/{filename}', [App\Http\Controllers\LibraryController::class,'downloadAttachment'])->name('downloadAttachment');

    //==============================library============================

Route::resource('library', App\Http\Controllers\LibraryController::class);


    //==============================Setting============================
Route::resource('settings', App\Http\Controllers\SettingController::class);





/***********************        Parents       ************************/

Route::view('add_parent','livewire.show_form');


/***********************        getproducts       ************************/

Route::get('/section/{id}',[App\Http\Controllers\ClassroomsController::class,'getproducts']);

/***********************        filterGrade       ************************/

Route::post("filterGrade", [App\Http\Controllers\ClassroomsController::class, 'filterGrade'])->name('filterGrade');



Route::get('/Get_classrooms/{id}',[App\Http\Controllers\StudentController::class,'Get_classrooms']);
Route::get('/Get_Sections/{id}',[App\Http\Controllers\StudentController::class,'Get_Sections']);


Route::post('Upload_attachment',[App\Http\Controllers\StudentController::class,'Upload_attachment'])->name('Upload_attachment');

Route::get('Download_attachment/{studentsname}/{filename}',[App\Http\Controllers\StudentController::class,'Download_attachment'])->name('Download_attachment');

Route::post('Delete_attachment',[App\Http\Controllers\StudentController::class,'Delete_attachment'])->name('Delete_attachment');

//lina 
Route::get("/{page}", [AdminController::class, 'index']);




