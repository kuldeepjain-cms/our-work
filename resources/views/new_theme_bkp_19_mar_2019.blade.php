<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <title></title>
    <link href="{{ URL::asset('public/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('public/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('public/css/bootstrap-theme.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('public/css/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ URL::asset('public/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('public/css/theme.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('public/css/responsive.css') }}" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{ URL::asset('public/js/ie-emulation-modes-warning.js') }}"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        
    #overlay {
        width: 100%;
        height: 100%;
        display:table;
        background: rgba(0, 0, 0, 0.5);
    }
    #overlay i {
       display:table-cell;
        vertical-align:middle;
        text-align:center;
    }
    .spin-big {
        font-size: 50px;
        height: 50px;
        width: 50px;
     
    }
    
    </style>
  </head>

  <body>
            
  <section class="banner-img" style="background:rgba(255,255,255,0.8) url(public/images/bg.png);">
     <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-center">
                    Technology
                </h1>
                <div class="tech_list">
                    <button class="button_all arrow_box">
                        All
                    </button>  
                    <nav class="greedy">
                    <ul class="links">
                    <!--<ul class="techlist links">-->
                    @foreach($technologies as $technology)
                        <li>
                            <a href="javascript:void(0);">
                                {{ $technology->technology_name }}
                            </a>    
                        </li>
                     @endforeach  
                    </ul>
                    <button count="" class=""><i style="font-size:24px;color:#fff;position: relative;top: 4px;" class="fa">&#xf0c9;</i></button>
                    <ul class="hidden-links hidden">
                    </ul>
                    </nav>

                    <ul class="sublist">
                        <li>
                            <div class="dropdown w230">
                              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                <span>Category</span>
                              <i class="category_img"></i></button>
                              <ul class="dropdown-menu mega-menu">
                                <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <ul>
                                     @foreach($categories as $category)
                                        <li>
                                            <a href="javascript:void(0);">
                                                {{ $category->category_name }}
                                            </a>
                                        </li>
                                    @endforeach   
                                    </ul>    
                                </li>
                            </ul>
                            </div>
                        </li> 
                        <li>
                            <div class="dropdown w165">
                              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                <span>Tags</span>
                              <i class="tag_img"></i></button>
                             <ul class="dropdown-menu mega-menu">
                                <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <ul>
                                        @foreach($tags as $tag)
                                        <li>
                                            <a href="javascript:void(0);">
                                                {{ $tag->tag_name }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>    
                                </li>
                                
                              </ul>
                            </div>
                        </li> 
                        <li>
                            <div class="btngroups">
                        <span>Multi Theme:</span>    
                        <div class="custom_check form-group">
                            <input type="radio" name="fancy-checkbox-default" id="fancy-checkbox-defaultt" class="portfolio-multi-theme" value="1" autocomplete="off" />
                            <div class="btn-group">
                                <label for="fancy-checkbox-defaultt" class="btn btn-default">
                                    <span class="glyphicon glyphicon-ok"></span>
                                    <span> </span>
                                </label>
                                <label for="fancy-checkbox-defaultt" class="btn btn-default lbl active">
                                   Yes
                                </label>    
                            </div>
                        </div>
                       
                        
                        
                        <div class="custom_check form-group">
                            <input type="radio" name="fancy-checkbox-default" id="fancy-checkbox-default" class="portfolio-multi-theme" value="0" autocomplete="off" />
                            <div class="btn-group">
                                <label for="fancy-checkbox-default" class="btn btn-default">
                                    <span class="glyphicon glyphicon-ok"></span>
                                    <span> </span>
                                </label>
                                <label for="fancy-checkbox-default" class="btn btn-default lbl active">
                                   No
                                </label>     
                            </div>
                        </div> 
                        <div class="clearfix"></div>
                        </div> 
                        </li>   
                        <li>
                            <div class="btngroups">
                        <span>Multi Site:</span>    
                        <div class="custom_check form-group">
                            <input type="radio" name="fancy-checkbox-defaultsite" id="fancy-checkbox-defaultt-siteone" class="portfolio-multi-site" value="1" autocomplete="off" />
                            <div class="btn-group">
                                <label for="fancy-checkbox-defaultt-siteone" class="btn btn-default">
                                    <span class="glyphicon glyphicon-ok"></span>
                                    <span> </span>
                                </label>
                                <label for="fancy-checkbox-defaultt-siteone" class="btn btn-default lbl active">
                                   Yes
                                </label>    
                            </div>
                        </div>
                       
                        
                        
                        <div class="custom_check form-group">
                            <input type="radio" name="fancy-checkbox-defaultsite" id="fancy-checkbox-default-sitetwo" class="portfolio-multi-site" value="0" autocomplete="off" />
                            <div class="btn-group">
                                <label for="fancy-checkbox-default-sitetwo" class="btn btn-default">
                                    <span class="glyphicon glyphicon-ok"></span>
                                    <span> </span>
                                </label>
                                <label for="fancy-checkbox-default-sitetwo" class="btn btn-default lbl active">
                                   No
                                </label>     
                            </div>
                        </div> 
                        <div class="clearfix"></div>
                        </div> 
                        </li> 
                        <li>
                            <div class="dropdown w155">
                              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span>Theme</span>
                              <i class="theme_img"></i></button>
                              <ul class="dropdown-menu mega-menu">
                                <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <ul>
                                       @foreach($themes as $theme)
                                        <li>
                                            <a href="javascript:void(0);">
                                                {{ $theme->theme_name }}
                                            </a>
                                        </li>
                                        @endforeach 
                                    </ul>    
                                </li>
                                
                              </ul>
                            </div>
                        </li>  
                        <li>
                            <div class="dropdown w135">
                              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                <span>Packages</span>
                              <i class="pkg_img"></i></button>
                              <ul class="dropdown-menu mega-menu">
                                <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <ul>
                                        @foreach($packages as $package)
                                        <li>
                                            <a href="javascript:void(0);">
                                                {{ $package->package_name }}
                                            </a>
                                        </li>
                                        @endforeach 
                                    </ul>    
                                </li>
                                
                              </ul>
                            </div>
                        </li> 
                    </ul>    
                </div>    
            </div>    
        </div>    
     </div>   
   

   <div class="container-fluid">
        <div class="row postList">
            <h2 class="text-center">Websites Portfolio</h2>
          
        @foreach($portfolios as $portfolio)
        <?php $postID = $portfolio->portfolioid; ?>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 gallery">
            <div class="hover ehover10">
                <img class="img-responsive" src="{{ URL::asset('template/frontend/images/'.$portfolio->image) }}" alt="Title img" />
                <div class="point">
                    <p>
                        <a data-fancybox="images" href="{{ URL::asset('template/frontend/images/'.$portfolio->image) }}" data-caption="Hitt">
                            <i class="zoom"></i>
                        </a>
                    </p>
                </div>
                <div class="overlay" style="background: #74bd30;">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <h2>{{ $portfolio->title }}</h2>
                    <h3>Categories: -</h3>
                    <ul class="technology">
                        <li>
                            <a href="javascript:void(0);">
                                Wordpress
                            </a>
                        </li>        
                    </ul>
                    </div>
                     <a target="_blank" href="{{url('portfoliodetail/'.$portfolio->portfolioid)}}" class="info">VIEW MORE</a>
                </div>
            </div>
        </div>
        @endforeach
        <div id="overlay" class="load-more" lastID="<?php echo $postID; ?>" style="display: none;">
                 
        <i class="fa fa-spinner fa-spin spin-big"></i>
   
        </div>
       </div>
   </div>

</section> 
    
    <script src="{{ URL::asset('public/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ URL::asset('public/js/ie10-viewport-bug-workaround.js') }}"></script>
    <script src="{{ URL::asset('public/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/greedynav.js') }}"></script>
    <script src="{{ URL::asset('public/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/custom.js') }}"></script>
    <script>
        (function($){
            $(window).on("load",function(){
                
                $(".dropdown-menu.mega-menu").mCustomScrollbar({
                    setHeight:300,
                    theme:"minimal-dark"
                });
            });
        })(jQuery);
            
            
        $(window).scroll(function(){
            var lastID = $('.load-more').attr('lastID');
            //alert(Math.floor($(window).scrollTop())+"="+($(document).height() - $(window).height()))
            if(lastID){
                if(Math.floor($(window).scrollTop()) == $(document).height() - $(window).height()) {  
                    $.ajax({
                        type:'POST',
                        url:'{{ url("loadmore") }}',
                        data:'id='+lastID,
                        beforeSend:function(){
                            $('.load-more').show();
                        },
                        success:function(html){
                            $('.load-more').remove();
                            $('.postList').append(html);
                        }
                    });
                }
            }
        });
        
        // Check multi theme or not then call appropriate ajax
        $(".portfolio-multi-theme").click(function(){
            if ($('.portfolio-multi-theme').is(':checked')) {
                var multiTheme = $('.portfolio-multi-theme:checked').val();
                var multiSite = $('.portfolio-multi-site:checked').val();
                var data = '';

                if(multiTheme != '') {
                    var data = 'multitheme='+multiTheme;
                    if(typeof multiSite != 'undefined') {
                        data += '&multisite='+multiSite;
                    }
                     $.ajax({
                        type:'POST',
                        url:'{{ url("filterData") }}',
                        data: data,
                        beforeSend:function(){
                            $('.load-more').show();
                        },
                        success:function(html){
                            $('.load-more').remove();
                            $('.postList').html(html);
                        }
                    });
                }
            }
        });
        // check multi site or not then call appropriate ajax
        $(".portfolio-multi-site").click(function(){
            if ($('.portfolio-multi-site').is(':checked')) {
                var multiSite = $('.portfolio-multi-site:checked').val();
                var multiTheme = $('.portfolio-multi-theme:checked').val();
                if(multiSite != '') {
                    var data = 'multisite='+multiSite;
                    if(typeof multiSite != 'undefined') {
                        data += '&multitheme='+multiTheme;
                    }
                     $.ajax({
                        type:'POST',
                        url:'{{ url("filterData") }}',
                        data: data,
                        beforeSend:function(){
                            $('.load-more').show();
                        },
                        success:function(html){
                            $('.load-more').remove();
                            $('.postList').html(html);
                        }
                    });
                }
            }
        });
    </script>
  </body>
</html>
