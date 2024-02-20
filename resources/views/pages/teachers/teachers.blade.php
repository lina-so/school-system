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
							<h4 class="content-title mb-0 my-auto">Teachers</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Teachers list</span>
						</div>
					</div>
		
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

	@if(session()->has('Add_grade'))
       <script>
	   window.onload=function(){
	   notif({
	   msg:"@lang('massage.success') ",
	   type:"success"
	   })
	   }
       </script>

    @endif

	@if(session()->has('update_grade'))
       <script>
	   window.onload=function(){
	   notif({
	   msg:"@lang('massage.update') ",
	   type:"success"
	   })
	   }
       </script>

    @endif

	
	@if(session()->has('delete_grade'))
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
								<a class="modal-effect btn btn-outline-primary btn-md" data-effect="effect-scale" href="{{route('teachers.create')}}"> Add Teacher</a>

							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table key-buttons text-md-nowrap">
										<thead>
											<tr>
											
												<th class="border-bottom-0">#</th>
												<th class="border-bottom-0">name</th>
												<th class="border-bottom-0"> Email</th>
												<th class="border-bottom-0"> Joining_Date</th>
												<th class="border-bottom-0"> Address</th>
												<th class="border-bottom-0"> Specialization_id</th>
												<th class="border-bottom-0"> Gender_id</th>
												<th class="border-bottom-0"> process</th>



											
												<th class="border-bottom-0"></th>


								
											</tr>
										</thead>
										<tbody>
										@php
										$i=0;
										@endphp
										@foreach($teachers as $grade)
										@php
										$i++;
										@endphp
											<tr>
											  
												<td>{{$i}}</td>
												<td>{{$grade->Name}}</td>
												<td>{{$grade->Email}}</td>
												<td>{{$grade->Joining_Date}}</td>
												<td>{{$grade->Address}}</td>
												<td>{{$grade->specializations->Name}}</td>
												<td>{{$grade->genders->Name}}</td>

												
												<td>
											
										

															<a class=" btn btn-sm btn-warning " data-effect="effect-scale"
														     href="{{route('teachers.edit',$grade->id)}}"    title="تعديل"><i
															class="las la-edit"></i></a>

								

															<a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
															data-id="{{$grade->id}}"
															data-toggle="modal" href="#modaldemo6" title="حذف"><i
															class="las la-trash"></i></a>

																
													
												</td>

												
												
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
											<h6 class="modal-title"> Delete Grade</h6><button aria-label="Close" class="close"
												data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
										</div>
										<form action="{{route('teachers.destroy','test')}}" method="post">
											{{ method_field('delete') }}
											{{ csrf_field() }}
											<div class="modal-body">
												<p>are you sure ?</p><br>
												<input type="hidden" name="id" id="id" value="">
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