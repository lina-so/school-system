@extends('layouts.master')
@section('css')
@section('title')
    اضافة فاتورة جديدة
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
اضافة فاتورة جديدة {{$student->name}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')

    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form method="post"  action="{{ route('Fees_Invoices.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Students_trans.personal_information')}}</h6><br>
                                <div class="row">
                                    <input type="hidden" name="Grade_id" value="{{$student->Grade_id}}">
                                    <input type="hidden" name="Classroom_id" value="{{$student->Classroom_id}}">
    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Name" class="mr-sm-2">اسم الطالب</label>
                                            <select class="custom-select mr-sm-2" name="student_id" required>
                                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                                            </select>
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Name_en" class="mr-sm-2">نوع الرسوم</label>
                                            <select class="custom-select mr-sm-2" name="fee_id" required>
                                                <option value="">-- اختار من القائمة --</option>
                                                @foreach($fees as $fee)
                                                    <option value="{{ $fee->id }}">{{ $fee->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Name_en" class="mr-sm-2">المبلغ</label>
                                            <select class="custom-select mr-sm-2" name="amount" required>
                                                <option value="">-- اختار من القائمة --</option>
                                                @foreach($fees as $fee)
                                                    <option value="{{ $fee->amount }}">{{ $fee->amount }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
        
        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description" class="mr-sm-2">البيان</label>
                                                <input type="text" class="form-control" name="description" required>
                                        </div>
                                    </div>
        
                                   
                                </div>
                                <button type="submit" class="btn btn-primary">تاكيد البيانات</button>
                            </form>   

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
  

@endsection
