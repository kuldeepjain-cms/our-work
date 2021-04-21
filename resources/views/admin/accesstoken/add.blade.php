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
					<li><a href="{{ url('admin/accesstoken') }}">Accesstoken</a></li>
					<li class="active">Add Accesstoken</li>
				</ul><!-- /.breadcrumb -->
					<!-- /.nav-search -->
			</div>
			<div class="page-content">
				<!-- /.ace-settings-container -->
				<div class="page-header">
					<h1>Add Accesstoken</h1>
				</div><!-- /.page-header -->
					<!-- /.row -->
				<div class="row">
					<div class="col-md-6"></div>
					<div class="col-md-6 text-right"><a href="{{url('admin/accesstoken')}}" class="btn btn-lg btn-success">Back</a></div>
				</div>
				<div class="row">
					<form role="form" method="post" action="{{url('admin/accesstoken/add')}}">
						{{ csrf_field() }}
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Token </label>

							<div class="col-sm-9">
								<input type="text" id="form-field-1" class="col-xs-10 col-sm-5" name="name" type="text" value="{{$accesstoken}}"  readonly required>
								
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> URL </label>

							<div class="col-sm-9">
								<input type="text" id="form-field-2" class="col-xs-10 col-sm-5" name="url" type="text" value="{{url('portfolio/'.$accesstoken)}}" readonly required>
								
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Technology </label>

							<div class="col-sm-9">
								<select class="col-xs-10 col-sm-5" id="form-field-select-1" name="technology" required>
									<option value="">Select Technology</option>
									<option value="all">All</option>
									@foreach ($categories as $category) 
										<option value="<?php echo strtolower($category->technology_id); ?>">{{ $category->technology_name }}</option>
									 @endforeach
									
								</select>
								
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Client </label>

							<div class="col-sm-9">
								<select class="col-xs-10 col-sm-5" id="form-field-select-1" name="client_id" required>
									<option value="">Select Client</option>
									@foreach($clients as $client)
                                    <option value="{{$client->client_id}}">{{$client->name}}</option>
                                    @endforeach
									
								</select>
								
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-3"> Select Status </label>

							<div class="col-sm-9">
								<select class="col-xs-10 col-sm-5" id="form-field-select-1" name="status" required>
								<option value="1">Active</option>
                                <option value="0">Inactive</option>	
								</select>
								
							</div>
						</div>
						
						
						
						
						
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