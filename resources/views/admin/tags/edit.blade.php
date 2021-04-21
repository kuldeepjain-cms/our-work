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
						<a href="{{ url('admin/dashboard') }}">Home</a>
					</li>
					<li><a href="{{ url('admin/tags') }}">Tags</a></li>
					<li class="active">Edit Tag</li>
				</ul><!-- /.breadcrumb -->
				@if(Session::has('message'))	
					<div class="alert alert-block alert-danger">
						<button type="button" class="close" data-dismiss="alert">
							<i class="ace-icon fa fa-times"></i>
						</button>
					<i class="ace-icon fa fa-times red"></i>
					<strong class="red">{{ Session::get('message') }}</strong>
					</div>
				@endif
					<!-- /.nav-search -->
			</div>
			<div class="page-content">
				<!-- /.ace-settings-container -->
				<div class="page-header">
					<h1>Edit Tag</h1>
				</div><!-- /.page-header -->
					<!-- /.row -->
				<div class="row">
					<div class="col-md-6"></div>
					<div class="col-md-6 text-right"><a href="{{url('admin/tags')}}" class="btn btn-lg btn-success">Back</a></div>
				</div>
				<div class="row">
					<form role="form" method="post" action="{{url('admin/tags/update')}}">
						{{ csrf_field() }}
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Technology </label>

							<div class="col-sm-9">
								<input type="text" id="form-field-1" class="col-xs-10 col-sm-5" name="name" value="{{$results[0]->tag_name}}" required>
								
							</div>
						</div>
						<input type="hidden" value="{{$results[0]->tag_id}}" name="id">
						<div class="form-group">
							
							<div class="col-sm-9 text-center">
								<button class="btn btn-info" type="submit" name="submit" value="submit">
									<i class="ace-icon fa fa-check bigger-110"></i>
									Submit
								</button>
							</div>
						</div>
					</form>
				</div>
			</div><!-- /.page-content -->
		</div>
	</div><!-- /.main-content -->
@include('admin.includes.footer');