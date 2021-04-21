@include('admin.includes.header');
<div class="main-container ace-save-state" id="main-container">
	<script type="text/javascript">
		try{ace.settings.loadState('main-container')}catch(e){}
	</script>
@include('admin.includes.sidebar');
	<div class="main-content">
		<div class="main-content-inner">
			<div class="breadcrumbs ace-save-state" id="breadcrumbs">
				<ul class="breadcrumb">
					<li>
						<i class="ace-icon fa fa-home home-icon"></i>
						<a href="{{url('admin/dashboard')}}">Home</a>
					</li>
					<li class="active">Packages</li>
				</ul><!-- /.breadcrumb -->
					<!-- /.nav-search -->
			</div>
			<div class="page-content">
				<!-- /.ace-settings-container -->
				<div class="page-header">
					<h1>
						Packages
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							overview &amp; stats
						</small>
					</h1>
				</div><!-- /.page-header -->
					<!-- /.row -->
				@if(Session::has('message'))	
					<div class="alert alert-block alert-success">
						<button type="button" class="close" data-dismiss="alert">
							<i class="ace-icon fa fa-times"></i>
						</button>
					<i class="ace-icon fa fa-check green"></i>
					<strong class="green">{{ Session::get('message') }}</strong>
					</div>
				@endif
				<div class="row">
					<div class="col-md-6"></div>
					<div class="col-md-6 text-right"><a href="{{url('admin/packages/add')}}" class="btn btn-lg btn-success">Add Package</a></div>
				</div>
				<div class="row">
					<table id="dynamic-table-packages" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<!-- <th class="center">
									<label class="pos-rel">
										<input type="checkbox" class="ace" />
										<span class="lbl"></span>
									</label>
								</th> -->
								<th>Package Name</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						@foreach($packages as $package)
							<tr>
								<!-- <td class="center">
									<label class="pos-rel">
										<input type="checkbox" class="ace" />
										<span class="lbl"></span>
									</label>
								</td> -->
								 <td>{{$package->package_name}}</td>
								
								<td>
									<div class="hidden-sm hidden-xs action-buttons">
										<a class="green" href="{{ url('admin/packages/edit/'.$package->package_id) }}">
											<i class="ace-icon fa fa-pencil bigger-130"></i>
										</a>

										<a class="red" href="{{ url('admin/packages/delete/'.$package->package_id) }}" onclick="return confirm('Do you want to delete this record?');">
											<i class="ace-icon fa fa-trash-o bigger-130"></i>
										</a>
									</div>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table> 
				</div>
			</div><!-- /.page-content -->
		</div>
	</div><!-- /.main-content -->
@include('admin.includes.footer');