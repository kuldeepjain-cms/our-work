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
					<li><a href="{{ url('admin/portfolio') }}">Portfolio</a></li>
					<li class="active">Add Portfolio</li>
				</ul><!-- /.breadcrumb -->
					<!-- /.nav-search -->
			</div>
			<div class="page-content">
				<!-- /.ace-settings-container -->
				<div class="page-header">
					<h1>Add Portfolio</h1>
				</div><!-- /.page-header -->
					<!-- /.row -->
				<div class="row">
					<div class="col-md-6"></div>
					<div class="col-md-6 text-right"><a href="{{url('admin/portfolio')}}" class="btn btn-lg btn-success">Back</a></div>
				</div>
				<div class="row">
					<form class="form-horizontal" role="form" method="post" action="{{ url('admin/portfolio/add') }}" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Title </label>

							<div class="col-sm-9">
								<input type="text" id="form-field-1" placeholder="Enter title" class="col-xs-10 col-sm-5" name="name" value="{{old('name')}}" />
								@if ($errors->has('name'))
                                    <div class="alert-danger">{{ $errors->first('name') }}</div>
                                @endif
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Client Name </label>

							<div class="col-sm-9">
								<input type="text" id="form-field-1" placeholder="Enter client name" class="col-xs-10 col-sm-5" name="client_name" value="{{old('client_name')}}" />
								@if ($errors->has('name'))
                                    <div class="alert-danger">{{ $errors->first('client_name') }}</div>
                                @endif
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Content </label>

							<div class="col-sm-9">
								<textarea id="form-field-2" placeholder="Enter content" class="col-xs-10 col-sm-5" name="content">{{old('content')}}</textarea>
								@if ($errors->has('content'))
                                    <div class="alert-danger">{{ $errors->first('content') }}</div>
                                @endif
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Category </label>

							<div class="col-sm-9">
								<select class="col-xs-10 col-sm-5" id="form-field-select-1" multiple="multiple" name="category[]">
									
									 @foreach ($categories as $category) 
                                    	<option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                 	@endforeach
									
								</select>
								@if ($errors->has('category'))
                                    <div class="alert-danger">{{ $errors->first('category') }}</div>
                                @endif
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Technology </label>

							<div class="col-sm-9">
								<select class="col-xs-10 col-sm-5" id="form-field-select-1" name="technology">
									<option value="">Select Technology</option>
									@foreach ($technologies as $technology) 
										<option value="{{ $technology->technology_id }}">{{ $technology->technology_name }}</option>
								 	@endforeach
									
								</select>
								@if ($errors->has('technology'))
                                    <div class="alert-danger">{{ $errors->first('technology') }}</div>
                                @endif
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tags </label>

							<div class="col-sm-9">
								<select class="col-xs-10 col-sm-5" id="form-field-select-1" multiple="multiple" name="tags[]">
									
									@foreach ($tag as $tags) 
                                    	<option value="{{ $tags->tag_id }}">{{ $tags->tag_name }}</option>
                                	 @endforeach
									
								</select>
								@if ($errors->has('tags'))
                                    <div class="alert-danger">{{ $errors->first('tags') }}</div>
                                @endif
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Web Server </label>

							<div class="col-sm-9">
								<select class="col-xs-10 col-sm-5" id="form-field-select-1" name="web_server">
									<option value="">Select Web Server</option>
									 @foreach ($servers as $server) 
                                       <option value="{{ $server->server_id }}">{{ $server->server_name }}</option>
                                    @endforeach
									
								</select>
								@if ($errors->has('web_server'))
                                    <div class="alert-danger">{{ $errors->first('web_server') }}</div>
                                @endif
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Theme</label>

							<div class="col-sm-9">
								<select class="col-xs-10 col-sm-5" id="form-field-select-1" name="theme">
									<option value="">Select Theme</option>
									@foreach ($themes as $theme) 
                                       <option value="{{ $theme->theme_id }}">{{ $theme->theme_name }}</option>
                                    @endforeach
									
								</select>
								@if ($errors->has('theme'))
                                    <div class="alert-danger">{{ $errors->first('theme') }}</div>
                                @endif
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> JS/CSS Package </label>

							<div class="col-sm-9">
								<select class="col-xs-10 col-sm-5" id="form-field-select-1" multiple="multiple" name="js_css_package[]">
									
									@foreach ($packages as $package) 
                                       <option value="{{ $package->package_id }}">{{ $package->package_name }}</option>
                                    @endforeach
									
								</select>
								 @if ($errors->has('js_css_package'))
                                    <div class="alert-danger">{{ $errors->first('js_css_package') }}</div>
                                @endif
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Payment methods </label>

							<div class="col-sm-9">
								<select class="col-xs-10 col-sm-5" id="form-field-select-1" multiple="multiple" name="payment_method[]">
									
									 @foreach ($payments as $payment) 
                                       <option value="{{ $payment->payment_id }}">{{ $payment->payment_name }}</option>
                                    @endforeach
									
								</select>
								 @if ($errors->has('payment_method'))
                                    <div class="alert-danger">{{ $errors->first('payment_method') }}</div>
                                @endif
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Multi Theme </label>

							<div class="col-sm-9">
								<label>
									<input name="multi_theme" type="radio" class="ace" value="1" @if(Request::old('multi_theme')) checked @endif />
									<span class="lbl"> Yes</span>
								</label>
							</div>

							<div class="col-sm-9">
								<label>
									<input name="multi_theme" type="radio" class="ace" value="0" @if(!Request::old('multi_theme')) checked @endif/>
									<span class="lbl"> No</span>
								</label>
							</div>
									
								
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Multi Site </label>

							<div class="col-sm-9">
								<label>
									<input type="radio" class="ace" name="multi_site" value="1" @if(Request::old('multi_site')) checked @endif />
									<span class="lbl"> Yes</span>
								</label>
							</div>

							<div class="col-sm-9">
								<label>
									<input type="radio" class="ace" name="multi_site" value="0" @if(!Request::old('multi_site')) checked @endif />
									<span class="lbl"> No</span>
								</label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Site Development Duration(Months) </label>

							<div class="col-sm-9">
								<input type="number" id="form-field-1" placeholder="Enter month ex(1,2,3..)" class="col-xs-10 col-sm-5" min="1" value="{{old('duration')}}" name="duration" />
								 @if ($errors->has('duration'))
                                    <div class="alert-danger">{{ $errors->first('duration') }}</div>
                                @endif
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Add-ons </label>

							<div class="col-sm-9">
								<textarea id="form-field-2" placeholder="Enter text" class="col-xs-10 col-sm-5" name="addons">{{old('addons')}}</textarea>
								@if ($errors->has('addons'))
                                    <div class="alert-danger">{{ $errors->first('addons') }}</div>
                                @endif
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Site Link </label>

							<div class="col-sm-9">
								<input type="text" id="form-field-1" placeholder="Enter website link" class="col-xs-10 col-sm-5" name="site_link" value="{{old('site_link')}}" />
								@if ($errors->has('site_link'))
                                    <div class="alert-danger">{{ $errors->first('site_link') }}</div>
                                @endif
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> File input </label>

							<div class="col-sm-9">
								<input type="file" id="id-input-file-2" name="image" />
								@if ($errors->has('image'))
                                    <div class="alert-danger">{{ $errors->first('image') }}</div>
                                @endif
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Display Index </label>

							<div class="col-sm-9">
								<input type="text" id="form-field-1" class="col-xs-10 col-sm-5" value="{{$displayindex[0]->display_index+1}}" readonly name="display_index" />
								@if ($errors->has('display_index'))
                                    <div class="alert-danger">{{ $errors->first('display_index') }}</div>
                                @endif
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