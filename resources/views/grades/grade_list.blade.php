@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Grades</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ grade list</span>
						</div>
					</div>
				
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">



                	<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<a class="modal-effect btn btn-outline-primary btn-md" data-effect="effect-scale"  data-toggle="modal" href="#modaldemo8"> Add Grade</a>

							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table key-buttons text-md-nowrap">
										<thead>
											<tr>
											
												<th class="border-bottom-0">#</th>
												<th class="border-bottom-0">name</th>
												<th class="border-bottom-0"> Notes</th>
												<th class="border-bottom-0"> proccess</th>
											
												<th class="border-bottom-0"></th>


								
											</tr>
										</thead>
										<tbody>
										@php
										$i=0;
										@endphp
										@foreach($grades as $grade)
										@php
										$i++;
										@endphp
											<tr>
											  
												<td>{{$i}}</td>
												<td>{{$grade->Name}}</td>
												<td>{{$grade->Notes}}</td>
												
												<td>
											
										

															<a class="modal-effect btn btn-sm btn-warning " data-effect="effect-scale"
														     href="#modaldemo9{{$grade->id}}"  data-toggle="modal"  title="تعديل"><i
															class="las la-edit"></i></a>

								

															<a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
															data-id="{{$grade->id}}"
															data-toggle="modal" href="#modaldemo6" title="حذف"><i
															class="las la-trash"></i></a>

																
													
												</td>

												
												
											</tr>

																		
													<!-- Edit modal -->
											<div class="modal" id="modaldemo9{{$grade->id}}">
												<div class="modal-dialog" role="document">
													<div class="modal-content modal-content-demo">
														<div class="modal-header">
															<h6 class="modal-title"> Edit Grade</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
														</div>
															<form action="{{route('grade.update',$grade->id)}}" method="post">
																 {{method_field('patch')}}
																{{csrf_field()}}

																<div class="modal-body">
																	<div class="form-group">
																
																		<input type="hidden" class="form-control" id="id" name="id" value="{{$grade->id}}">
																	</div>


																	<div class="form-group">
																		<label for="exampleInputEmaili"> grade Name_ar</label>
																
																		<input type="text" class="form-control" id="Name" name="Name" value="{{$grade->getTranslation('Name','ar')}}" required>
																	</div>

																	<div class="form-group">
																		<label for="exampleInputEmaili"> grade Name_en</label>
																
																		<input type="text" class="form-control" id="Name_en" name="Name_en" value="{{$grade->getTranslation('Name','en')}}" required>
																	</div>

																	

																<div class="form-group">
																	<label for="exampleInputEmaili"> Notes</label>
																	<textarea type="text" class="form-control" id="Notes" name="Notes" value="{{$grade->Notes}}" rows="3"></textarea>
																</div>

																</div>


																<div class="modal-footer">
																	<button class="btn  btn-primary" type="submit">Update</button>
																	<button class="btn  btn-secondary" data-dismiss="modal" type="button">cancel</button>
																</div>
															</form>
													</div>
												</div>
											</div>




											
										

											@endforeach
										
										
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

						<!-- Basic modal -->
				<div class="modal" id="modaldemo8">
					<div class="modal-dialog" role="document">
						<div class="modal-content modal-content-demo">
							<div class="modal-header">
								<h6 class="modal-title"> Add Grade</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
							</div>
								<form action="{{route('grade.store')}}" method="post">
									{{csrf_field()}}

									<div class="modal-body">
										<div class="form-group">
											<label for="exampleInputEmaili"> grade Name_ar</label>
									
											<input type="text" class="form-control" id="Name" name="Name" required>
										</div>

										<div class="form-group">
											<label for="exampleInputEmaili"> grade Name_en</label>
									
											<input type="text" class="form-control" id="Name_en" name="Name_en" required>
										</div>

										

									<div class="form-group">
										<label for="exampleInputEmaili"> Notes</label>
										<textarea type="text" class="form-control" id="Notes" name="Notes" rows="3"></textarea>
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
@endsection