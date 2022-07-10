@extends('layouts.smart-hr', ['title'=>'Dashboard'])
@section('content')

<!-- Page Wrapper -->
<div class="page-wrapper">
			
	<!-- Page Content -->
	<div class="content container-fluid">
					
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Welcome TL!</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item active">Dashboard</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
				<div class="card dash-widget bg-danger" >
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa fa-briefcase"></i></span>
						<div class="dash-widget-info">
							<h3>{{Auth::user()->employee->project->name}}</h3>
							<span>My project</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
				<div class="card dash-widget bg-warning">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa fa-address-card"></i></span>
						<div class="dash-widget-info">
							<h3>{{Auth::user()->employee->team->name}}</h3>
							<span>My team</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
				<div class="card dash-widget bg-info">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="la la-sitemap"></i></span>
						<div class="dash-widget-info">
							<h3>{{Auth::user()->employee->team->members->count()}}</h3>
							<span>Team Members</span>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		{{-- charts --}}
		
		
		<!-- Statistics Widget -->
		<div class="row">
			<div class="col-md-12 col-lg-6 col-xl-4 d-flex">
				
				<div class="card flex-fill border-success dash-statistics">
					<div class="card-header bg-success">
						<h4 class="card-title">Leave Statistics This Month</h4>
					</div>
					<div class="card-body">
						<div class="stats-list">
							<div class="stats-info">
								<p>Applications <strong>@if(count($leaves)>0){{$leaves->where('created_at', '>', Carbon::now()->subMonths(1)->endOfMonth())->count()}} @else 0 @endif <small>/ {{$members->count()}} members</small></strong></p>
								<div class="progress">
									<div class="progress-bar bg-primary" role="progressbar" style="width: {{(40/650)*100}}%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<div class="stats-info">
								<p>Approved <strong>29<small>/ 40</small></strong></p>
								<div class="progress">
									<div class="progress-bar bg-success" role="progressbar" style="width: {{(29/40)*100}}%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<div class="stats-info">
								<p>Pending <strong>8 <small>/ 40</small></strong></p>
								<div class="progress">
									<div class="progress-bar bg-warning" role="progressbar" style="width: {{(8/40)*100}}%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<div class="stats-info">
								<p>Rejected <strong>3 <small>/ 40</small></strong></p>
								<div class="progress">
									<div class="progress-bar bg-danger" role="progressbar" style="width: {{(3/40)*100}}%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<div class="stats-info">
								<p>Still on leave <strong>7 <small>/ 29</small></strong></p>
								<div class="progress">
									<div class="progress-bar bg-info" role="progressbar" style="width: {{(7/29)*100}}%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-12 col-lg-6 col-xl-4 d-flex">
				<div class="card flex-fill border-success">
					<div class="card-header bg-success">
						<h4 class="card-title">Attendance Statistics This Month</h4>
					</div>
					<div class="card-body">
						<div class="statistics">
							<div class="row">
								<div class="col-md-6 col-6 text-center">
									<div class="stats-box mb-4">
										<p>Total Tasks</p>
										<h3>385</h3>
									</div>
								</div>
								<div class="col-md-6 col-6 text-center">
									<div class="stats-box mb-4">
										<p>Overdue Tasks</p>
										<h3>19</h3>
									</div>
								</div>
							</div>
						</div>
						<div class="progress mb-4">
							<div class="progress-bar bg-success" role="progressbar" style="width: 24%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
							<div class="progress-bar bg-purple" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
							<div class="progress-bar bg-warning" role="progressbar" style="width: 22%" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"></div>
							<div class="progress-bar bg-danger" role="progressbar" style="width: 26%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100"></div>
							<div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<div>
							<p><i class="fa fa-dot-circle-o text-success mr-2"></i>Present 100% <span class="float-right">31</span></p>
							<p><i class="fa fa-dot-circle-o text-purple mr-2"></i>Half day <span class="float-right">{{count($attendance->where('status', 'halfday'))}}</span></p>
							<p><i class="fa fa-dot-circle-o text-warning mr-2"></i>Sick offs <span class="float-right">{{count($attendance->where('status', 'sick off'))}}</span></p>
							<p><i class="fa fa-dot-circle-o text-danger mr-2"></i>Absenteeism cases <span class="float-right">{{count($attendance->where('status', 'absent'))}}</span></p>
							<p class="mb-0"><i class="fa fa-dot-circle-o text-info mr-2"></i>Leaves <span class="float-right">{{count($attendance->where('status', 'leave'))}}</span></p>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-12 col-lg-6 col-xl-4 d-flex">
				<div class="card flex-fill border-success">
					<div class="card-header bg-success">
						<h4 class="card-title">Attendance Overview Today</h4>
					</div>
					<div class="card-body">
						<h5 class=""> Present<span class="badge bg-inverse-danger ml-2">3</span></h5	>
						<h5 class=""> Week off<span class="badge bg-inverse-danger ml-2">3</span></h5	>
						<h5 class=""> On Leave<span class="badge bg-inverse-danger ml-2">3</span></h5	>
						<h5 class=""> Sick Off<span class="badge bg-inverse-danger ml-2">3</span></h5	>
						<h5 class="card-title text-warning"> Absent<span class="badge bg-inverse-danger ml-2">3</span></h5>
						<div class="leave-info-box">
							<div class="media align-items-center">
								<div class="media-body">
									<span class="badge bg-inverse-danger">Absent Members</span>
								</div>
							</div>
							<div class="row align-items-center mt-3">
								<div class="col-12">
									member 1
								</div>
								<div class="col-12">
									member 2
								</div>
								<div class="col-12">
									member 3
								</div>
							</div>
						</div>
						
						<div class="load-more text-center">
							<a class="text-dark" href="{{route('attendance.index')}}">Attendance</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Statistics Widget -->
		
		<div class="row">
			<div class="col-md-6 d-flex">
				<div class="card card-table flex-fill">
					<div class="card-header">
						<h3 class="card-title mb-0">Team members</h3>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-nowrap custom-table mb-0">
								<thead>
									<tr>
										<th>Name</th>
										<th>phone</th>
										<th>Email</th>
										<th>Queue</th>
										<th>Week off</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($members as $member)
										<tr>
											<td><h2><a href="{{route('employees.show',$member)}}">{{$member->name}}</a></h2></td>
											<td>
												{{$member->phone1}}
											</td>
											<td>
												<a href="mailto: {{$member->work_email}}">{{$member->work_email}}</a>
											</td>
											<td>{{1}}</td>
											<td>
												<span class="badge">Sun</span>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-footer">
						<a href="#">Team {{Auth::user()->employee->team->name}}</a>
					</div>
				</div>
			</div>
			<div class="col-md-6 d-flex">
				<div class="card card-table flex-fill">
					<div class="card-header">
						<h3 class="card-title mb-0">Leave applications</h3>
					</div>
					<div class="card-body">
						<div class="table-responsive">	
							<table class="table custom-table table-nowrap mb-0">
								<thead>
									<tr>
										<th>Name</th>
										<th>Applied</th>
										<th>Days</th>
										<th>Start</th>
										<th>Finish</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									@if($leaves->count()>0)
									 @foreach ($leaves as $leave)
										<tr>
											<td>
												<a href="{{route('employees.show',$leave->employee)}}">{{$leave->employee->first_name}}</a>
											</td>
											<td>{{date('Y-m-d', strtotime($leave->created_at))}}</td>
											<td>{{$leave->days}}</td>
											<td>{{date('Y-m-d', strtotime($leave->start_date))}}</td>
											<td>{{date('Y-m-d', strtotime($leave->finish_date))}}</td>
											@if(strtolower($leave->status='approved'))
												<td class="text-success">{{$leave->status}}</td>
											@elseif(strtolower($leave->status='new'))
												<td class="text-purple">{{$leave->status}}</td>
											@elseif(strtolower($leave->status='declined'))
												<td class="text-danger">{{$leave->status}}</td>
											@else
												<td class="text-warning">{{$leave->status}}</td>
											@endif
											
										</tr>
									@endforeach 
									@else
										No data available
									@endif
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-footer">
						<a href="#">Leave applications</a>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6 d-flex">
				<div class="card card-table flex-fill">
					<div class="card-header">
						<h3 class="card-title mb-0">Clients</h3>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table custom-table mb-0">
								<thead>
									<tr>
										<th>Company Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Status</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
									{{-- @foreach ($clients as $client)
									<tr>
										<td>
											<h2 class="table-avatar">
												<a href="client-#">{{$client->name}} </a>
											</h2>
										</td>
										<td>{{$client->email}}</td>
										<td>{{$client->phone}}</td>
										<td>
											<div class="dropdown action-label">
												<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-dot-circle-o text-success"></i> Active
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
												</div>
											</div>
										</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									@endforeach --}}
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-footer">
						<a href="#">View all clients</a>
					</div>
				</div>
			</div>
			<div class="col-md-6 d-flex">
				<div class="card card-table flex-fill">
					<div class="card-header">
						<h3 class="card-title mb-0"> Projects</h3>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table custom-table mb-0">
								<thead>
									<tr>
										<th>Project Name </th>
										<th> Work Force Distribution</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
									{{-- @foreach($projects as $project)
									<tr>
										<td>
											<h2><a href="project-#">{{$project->name}}</a></h2>
											<small class="block text-ellipsis">
												<span>1</span> <span class="text-muted">open tasks, </span>
												<span>9</span> <span class="text-muted">tasks completed</span>
											</small>
										</td>
										<td>
											<p> <strong>{{$x=$project->members->count()}} <small>/ {{$t=$employees->count()}}</small></strong></p>
											<div class="progress progress-xs progress-striped">
												<div class="progress-bar" role="progressbar" data-toggle="tooltip" title="65%" style="width: {{($x/$t)*100}}%"></div>
											</div>
										</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									@endforeach --}}
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-footer">
						<a href="#">View all projects</a>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- /Page Content -->
</div>
<!-- /Page Wrapper -->
@endsection