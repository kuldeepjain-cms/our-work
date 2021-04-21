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
                    <li class="active">Edit Portfolio</li>
                </ul><!-- /.breadcrumb -->
                    <!-- /.nav-search -->
            </div>
            <div class="page-content">
                <!-- /.ace-settings-container -->
                <div class="page-header">
                    <h1>Edit Portfolio</h1>
                </div><!-- /.page-header -->
                    <!-- /.row -->
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6 text-right"><a href="{{url('admin/portfolio')}}" class="btn btn-lg btn-success">Back</a></div>
                </div>
                <div class="row">
                    <form class="form-horizontal" role="form" method="post" action="{{url('admin/portfolio/update')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                         <input value="{{$results[0]->portfolioid}}" type="hidden" name="id">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Title </label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" placeholder="Enter title" class="col-xs-10 col-sm-5" name="name" value="{{$results[0]->title}}" />
                                @if ($errors->has('name'))
                                    <div class="alert-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Client Name </label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" placeholder="Enter client name" class="col-xs-10 col-sm-5" name="client_name" value="{{$results[0]->client_name}}" />
                                @if ($errors->has('client_name'))
                                    <div class="alert-danger">{{ $errors->first('client_name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Content </label>

                            <div class="col-sm-9">
                                <textarea id="form-field-2" placeholder="Enter content" class="col-xs-10 col-sm-5" name="content">{{$results[0]->content}}</textarea>
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
                                        <option value="{{ $category->category_id }}" 
                                            <?php $categories = explode(",", $results[0]->category);
                                             if(in_array($category->category_id, $categories)){ echo "selected='selected'"; } ?>>{{ $category->category_name }}</option>
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
                                        <option value="{{ $technology->technology_id }}" @if($results[0]->technology == $technology->technology_id) selected='selected' @endif>{{ $technology->technology_name }}</option>
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
                                    
                                    @foreach ($tag as $tag1) 
                                        <option value="{{ $tag1->tag_id }}" <?php $tags = explode(",", $results[0]->tags); if(in_array($tag1->tag_id, $tags)){ echo "selected='selected'"; } ?>>{{ $tag1->tag_name }}</option>
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
                                       <option value="{{ $server->server_id }}" @if($results[0]->web_server == $server->server_id) selected='selected' @endif>{{ $server->server_name }}</option>
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
                                       <option value="{{ $theme->theme_id }}" @if($results[0]->theme == $theme->theme_id) selected='selected' @endif>{{ $theme->theme_name }}</option>
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
                                       <option value="{{ $package->package_id }}" <?php $packagess = explode(",", $results[0]->js_css_packages); if(in_array($package->package_id, $packagess)){ echo "selected='selected'"; } ?>>{{ $package->package_name }}</option>
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
                                       <option value="{{ $payment->payment_id }}" <?php $paymentss = explode(",", $results[0]->payment_methods); if(in_array($payment->payment_id, $paymentss)){ echo "selected='selected'"; } ?>>{{ $payment->payment_name }}</option>
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
                                    <input name="multi_theme" type="radio" class="ace" value="1" @if($results[0]->multi_theme == "1") checked='checked' @endif  />
                                    <span class="lbl"> Yes</span>
                                </label>
                            </div>

                            <div class="col-sm-9">
                                <label>
                                    <input name="multi_theme" type="radio" class="ace" value="0" @if($results[0]->multi_theme == "0") checked='checked' @endif/>
                                    <span class="lbl"> No</span>
                                </label>
                            </div>
                                    
                                
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Multi Site </label>

                            <div class="col-sm-9">
                                <label>
                                    <input type="radio" class="ace" name="multi_site" value="1" @if($results[0]->multi_sites == "1") checked @endif />
                                    <span class="lbl"> Yes</span>
                                </label>
                            </div>

                            <div class="col-sm-9">
                                <label>
                                    <input type="radio" class="ace" name="multi_site" value="0" @if($results[0]->multi_sites == "0") checked @endif />
                                    <span class="lbl"> No</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Site Development Duration(Months) </label>

                            <div class="col-sm-9">
                                <input type="number" id="form-field-1" placeholder="Enter month ex(1,2,3..)" class="col-xs-10 col-sm-5" min="1" value="{{$results[0]->duration}}" name="duration" />
                                 @if ($errors->has('duration'))
                                    <div class="alert-danger">{{ $errors->first('duration') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Add-ons </label>

                            <div class="col-sm-9">
                                <textarea id="form-field-2" placeholder="Enter text" class="col-xs-10 col-sm-5" name="addons">{{$results[0]->addons}}</textarea>
                                @if ($errors->has('addons'))
                                    <div class="alert-danger">{{ $errors->first('addons') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Site Link </label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" placeholder="Enter website link" class="col-xs-10 col-sm-5" name="site_link" value="{{$results[0]->site_link}}" />
                                @if ($errors->has('site_link'))
                                    <div class="alert-danger">{{ $errors->first('site_link') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> File input </label>

                            <div class="col-sm-9">
                                <input type="hidden" id="id-input-file-2" name="old_image" value="{{$results[0]->image}}"/>
                                <input type="file" id="id-input-file-2" name="image" />
                                @if (file_exists('template/frontend/images/'.$results[0]->image))
                                   <img src="{{ URL::asset('template/frontend/images/'.$results[0]->image) }}" alt="" height="100px" width="100px"/>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Display Index </label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" class="col-xs-10 col-sm-5" value="{{$results[0]->display_index}}" readonly name="display_index" />
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