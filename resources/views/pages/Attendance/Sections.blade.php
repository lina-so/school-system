@extends('layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/accordion/accordion.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Sections_trans.title_page') }}: الحضور والغياب
@stop
<!-- breadcrumb -->
@endsection
@section('content')

				<!-- row -->
				<div class="row">

					<div class="col-xl-12">
						<div class="card">
							<div class="card-header">
								<h2> الأقسام : الحضور والغياب</h2>
								<a class="modal-effect btn btn-outline-primary btn-md" data-effect="effect-scale"  data-toggle="modal" href="#modaldemo8"> Add section</a>

							</div>
							<div class="card-body">
								<div id="accordion" class="w-100 br-2 overflow-hidden">
								
										@php
										$i=0;
										@endphp
							  @foreach ($Grades as $grade )
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
                                                            <td>{{ $list_Sections->section_name }}</td>
                                                            <td>{{ $list_Sections->class->class_name }}
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
                                                                   href="{{route('Attendance.show',$list_Sections->id)}}"> قائمة الطلاب</a>
                                                               
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
                                    value + '">' + value + '</option>');
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