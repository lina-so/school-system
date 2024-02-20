@extends('layouts.master')
@section('css')
<!-- Interenal Accordion Css -->
<link href="{{URL::asset('assets/plugins/accordion/accordion.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Sections</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Sections list</span>
						</div>
					</div>
				
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

	@if(session()->has('Add_section'))
       <script>
	   window.onload=function(){
	   notif({
	   msg:"@lang('massage.success') ",
	   type:"success"
	   })
	   }
       </script>

    @endif


	@if(session()->has('delete_section'))
       <script>
	   window.onload=function(){
	   notif({
	   msg:"@lang('massage.delete') ",
	   type:"success"
	   })
	   }
       </script>

    @endif
				<!-- row -->
				<div class="row">

					<div class="col-xl-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">sections list</h3>
								<a class="modal-effect btn btn-outline-primary btn-md" data-effect="effect-scale"  data-toggle="modal" href="#modaldemo8"> Add section</a>

							</div>
							<div class="card-body">
								<div id="accordion" class="w-100 br-2 overflow-hidden">
								
										@php
										$i=0;
										@endphp
							  @foreach ($grades as $grade )
								  @php
								$i++;
								@endphp
								  	<div class="">
										<div class="accor  bg-primary" id="headingThree3">
											<h4 class="m-0">
												<a href="#collapseThree{{$i}}" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
													{{$grade->Name}} <i class="si si-cursor-move ml-2"></i>
												</a>
											</h4>
										</div>
										<div id="collapseThree{{$i}}" class="collapse b-b0 bg-white" aria-labelledby="headingThree" data-parent="#accordion">
											<div class="border p-3">
												<table class="table mb-0 table-bordered border-top mb-0">
													<thead>
													  <tr>
														<th>#</th>
														<th>section name</th>
														<th>class name</th>
														<th>status</th>
														<th>processor</th>

													  </tr>
													</thead>
													<tbody>
													 <?php $i = 0; ?>

													 
                                                    @foreach ($grade->sections as $list_Sections)

												
                                                        <tr>
                                                            <?php $i++; ?>
                                                            <td>{{ $i }}</td>
                                                            <td>{{$list_Sections->section_name}}</td>
                                                            <td>
                                                            	{{$list_Sections->class->class_name}}
                                                            </td>
                                                            <td>
                                                                @if ($list_Sections->status === 1)
                                                                    <label
                                                                        class="badge badge-success">active</label>
                                                                @else
                                                                    <label
                                                                        class="badge badge-danger">not active</label>
                                                                @endif

                                                            </td>
                                                            <td>

                                                                <a 
                                                                   class="btn btn-info btn-sm"
                                                                   data-effect="effect-scale"  data-toggle="modal" href="#edit{{ $list_Sections->id }}"> edit</a>
                                                                <a 
                                                                   class="btn btn-outline-danger btn-sm" data-effect="effect-scale"  data-toggle="modal" href="#modaldemo3"
                                                                   data-target="#delete{{ $list_Sections->id }}">delete</a>
                                                            </td>
                                                        </tr>



														




							  @endforeach

													</tbody>
												</table>
											</div>
										</div>
									</div>
							  @endforeach
								
								
								</div>
							</div>
						</div>
				</div>

				</div>

                                           <!-- add section -->
											<div class="modal" id="modaldemo8">
												<div class="modal-dialog" role="document">
													<div class="modal-content modal-content-demo">
														<div class="modal-header">
															<h6 class="modal-title"> add section </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
														</div>
															<form action="{{route('sections.store')}}" method="post">
																{{csrf_field()}}

																<div class="modal-body">
																	<div class="form-group">
																
																	</div>


																	<div class="form-group">
																		<label for="exampleInputEmaili"> section Name_ar</label>
																
																		<input type="text" class="form-control" id="section_name" name="section_name" required>
																	</div>

																	<div class="form-group">
																		<label for="exampleInputEmaili"> section Name_en</label>
																
																		<input type="text" class="form-control" id="section_name_en" name="section_name_en"  required>
																	</div>

																	

																	<div class="form-group">
																		<label for="exampleInputEmaili"> grades</label>
																		       
																							
																			<select name="grade_id" class="form-control SlectBox" onclick="console.log($(this).val())" 
																				 btn btn-success btn-md >
																				<!--placeholder-->
																				<option value="" selected disabled > shoose grade</option>
																				@foreach ($Grades as $grade)
																					<option value="{{ $grade->id }}"> {{ $grade->Name }}</option>
																				@endforeach
																			</select>


																	</div>

																	<div class="form-group">
																		<label for="exampleInputEmaili"> classrooms</label>
																		       
																							
																			<select name="class_id" class="form-control SlectBox" onclick="console.log($(this).val())" 
																				 btn btn-success btn-md >
																				<!--placeholder-->
																		
																				
																			</select>


																	</div>


																	<div class="col">
																		<label for="inputName" class="control-label">Teachers Name</label>
																		<select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
																			@foreach($teachers as $teacher)
																				<option value="{{$teacher->id}}">{{$teacher->Name}}</option>
																			@endforeach
																		</select>
																	</div>
																			
																</div>



																<div class="modal-footer">
																	<button class="btn  btn-primary" type="submit">save</button>
																	<button class="btn  btn-secondary" data-dismiss="modal" type="button">cancel</button>
																</div>
															</form>
													</div>
												</div>
											</div>


										</div>

			
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')

   <script>
        $(document).ready(function() {
            $('select[name="grade_id"]').on('change', function() {
                var SectionId = $(this).val();
                if (SectionId) {
                    $.ajax({
                        url: "{{ URL::to('section') }}/" + SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="class_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="class_id"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>


<!--- Internal Accordion Js -->
<script src="{{URL::asset('assets/plugins/accordion/accordion.min.js')}}"></script>
<script src="{{URL::asset('assets/js/accordion.js')}}"></script>
@endsection