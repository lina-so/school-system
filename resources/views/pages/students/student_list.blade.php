@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

<!--- Custom-scroll -->
<link href="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">students</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ students list</span>
						</div>
					</div>
		
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

	@if(session()->has('Add_student'))
       <script>
	   window.onload=function(){
	   notif({
	   msg:"@lang('massage.success') ",
	   type:"success"
	   })
	   }
       </script>

    @endif

	@if(session()->has('update_student'))
       <script>
	   window.onload=function(){
	   notif({
	   msg:"@lang('massage.update') ",
	   type:"success"
	   })
	   }
       </script>

    @endif

	
	@if(session()->has('delete_student'))
       <script>
	   window.onload=function(){
	   notif({
	   msg:"@lang('massage.delete') ",
	   type:"success"
	   })
	   }
       </script>

    @endif


	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif


				<!-- row -->
				<div class="row">

<!--div-->
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<a class=" btn btn-outline-primary btn-md" data-effect="effect-scale"   href="{{route('students.create')}}"> Add student</a>

							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table key-buttons text-md-nowrap">
										<thead>
											<tr>
											
												<th class="border-bottom-0">#</th>
												<th class="border-bottom-0">name</th>
												<th class="border-bottom-0"> email</th>
												<th class="border-bottom-0"> gender</th>
												<th class="border-bottom-0"> nationaliitie</th>
												<th class="border-bottom-0"> blood</th>
												<th class="border-bottom-0"> Data Birth</th>
												<th class="border-bottom-0"> Grade</th>
												<th class="border-bottom-0"> classroom</th>
												<th class="border-bottom-0"> section</th>
												<th class="border-bottom-0"> parent</th>
												<th class="border-bottom-0"> academic year</th>
												<th class="border-bottom-0"> process</th>
												<th class="border-bottom-0"></th>


								
											</tr>
										</thead>
										<tbody>
										@php
										$i=0;
										@endphp
										@foreach($students as $student)
										@php
										$i++;
										@endphp
											<tr>
											  
												<td>{{$i}}</td>
												<td>{{$student->name}}</td>
												<td>{{$student->email}}</td>
												<td>{{$student->genders->Name}}</td>
												<td>{{$student->Nationality->Name}}</td>
												<td>{{$student->blood_id}}</td>
												<td>{{$student->Date_Birth}}</td>
												<td>{{$student->grade->Name}}</td>
												<td>{{$student->classroom->class_name}}</td>
												<td>{{$student->section->section_name}}</td>
												<td>{{$student->myparent->Name_Father}}</td>
												<td>{{$student->academic_year}}</td>

												<td>
													<div class="dropdown">
														<button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
														data-toggle="dropdown" id="dropdownMenuButton" type="button">Dropdown Menu <i class="fas fa-caret-down ml-1"></i></button>
														<div  class="dropdown-menu tx-13">
															

															<a class=" btn btn-sm btn-warning " data-effect="effect-scale"
															href="{{route('students.edit',$student->id)}}"  title="تعديل"><i
														   class="las la-edit"></i></a>

														   <a class=" btn btn-sm btn-danger" data-effect="effect-scale"
														   data-id="{{$student->id}}"
														   data-toggle="modal" href="#modaldemo6" title="حذف"><i
														   class="las la-trash"></i></a>

														   <a class=" btn btn-sm btn-success" role="button"  aria-pressed="true"
															data-id="{{$student->id}}"
															 href="{{route('students.show',$student->id)}}" title="show"><i
															class="las la-eye"></i></a>

																

															<a class="dropdown-item" href="{{route('Fees_Invoices.show',$student->id)}}"> إضافة رسوم</a>

															<a class="dropdown-item" href="{{route('receipt_students.show',$student->id)}}">  سند قبض</a>

															<a class="dropdown-item" href="{{route('ProcessingFee.show',$student->id)}}">   استبعاد رسوم</a>															

															<a class="dropdown-item" href="#">  طباعة الفاتورة</a>




														</div>
													</div>
												</td>
												
												<td>
											

								

															


                                                            


																
													
												</td>


												
												{{-- <td>
											
															<a class=" btn btn-sm btn-warning " data-effect="effect-scale"
														     href="{{route('students.edit',$student->id)}}"  title="تعديل"><i
															class="las la-edit"></i></a>

								

															<a class=" btn btn-sm btn-danger" data-effect="effect-scale"
															data-id="{{$student->id}}"
															data-toggle="modal" href="#modaldemo6" title="حذف"><i
															class="las la-trash"></i></a>



                                                            <a class=" btn btn-sm btn-success" role="button"  aria-pressed="true"
															data-id="{{$student->id}}"
															 href="{{route('students.show',$student->id)}}" title="حذف"><i
															class="las la-eye"></i></a>



																
													
												</td> --}}



												
												
											</tr>

											@endforeach
										
										
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

			


						<!-- delete -->
							<div class="modal" id="modaldemo6">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content modal-content-demo">
										<div class="modal-header">
											<h6 class="modal-title"> Delete student</h6><button aria-label="Close" class="close"
												data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
										</div>
										<form action="{{route('students.destroy','test')}}" method="post">
											{{ method_field('delete') }}
											{{ csrf_field() }}
											<div class="modal-body">
												<p>are you sure ?</p><br>
												<input type="text" name="id" id="id" value="">
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
												<button type="submit" class="btn btn-danger">save</button>
											</div>
									</div>
									</form>
								</div>
							</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.mCustomScrollbar js-->
<script src="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!--Internal  Clipboard js-->
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.js')}}"></script>
<!-- Internal Prism js-->
<script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>

  <script>
        $('#modaldemo6').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)

            modal.find('.modal-body #id').val(id);
        })
    </script>

	<!--Internal  Notify js -->
<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection