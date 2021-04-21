<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <title>Portfolio</title>

    

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
    .selected1{
        background-color:black;
    }
    .selected{
        background-color: #83be51;
    }
    .sublist li .dropdown .dropdown-menu.mega-menu li ul li a .category.selected:hover
    {
        color: white;
    }
    
    </style>
  </head>

  <body>
    

   <input type="hidden" id="tokenid" value={{ $token }}/>
  <section class="banner-img portfolio" style="background:rgba(255,255,255,0.8) url(/our-work/public/images/bg.png);">
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
                     <?php $technologyid = DB::table('accesstoken')
                                     ->where('accesstoken', '=', $token)->pluck('technology')->first();

                        ?>

                    @if($token =="")  
                        <nav class="greedy">
                        <ul class="links">
                        <!--<ul class="techlist links">-->

                        @foreach($technologies as $technology)
                            <li class="color_change">
                                <a href="javascript:void(0);" class="technology_change" data-id="{{ $technology->technology_id }}">
                                    {{ $technology->technology_name }}
                                </a>    
                            </li>
                         @endforeach  
                        </ul>
                        <button count="" class=""><i style="font-size:24px;color:#fff;position: relative;top: 4px;" class="fa">&#xf0c9;</i></button>
                        <ul class="hidden-links hidden">
                        </ul>
                        </nav>
                    @elseif($technologyid == 'all')
                        <nav class="greedy">
                        <ul class="links">
                        <!--<ul class="techlist links">-->

                        @foreach($technologies as $technology)
                            <li class="color_change">
                                <a href="javascript:void(0);" class="technology_change" data-id="{{ $technology->technology_id }}">
                                    {{ $technology->technology_name }}
                                </a>    
                            </li>
                         @endforeach  
                        </ul>
                        <button count="" class=""><i style="font-size:24px;color:#fff;position: relative;top: 4px;" class="fa">&#xf0c9;</i></button>
                        <ul class="hidden-links hidden">
                        </ul>
                        </nav>
                    @else
                        <nav class="greedy demo">
                        <ul class="links">
                        <!--<ul class="techlist links">-->
                        
                        @foreach($technologies as $technology)

                            <li class="color_change">
                                <a href="javascript:void(0);" class="technology_change" data-id="{{ $technology->technology_id }}">
                                    {{ $technology->technology_name }}
                                </a>    
                            </li>
                         @endforeach  
                        </ul>
                        <button count="" class=""><i style="font-size:24px;color:#fff;position: relative;top: 4px;" class="fa">&#xf0c9;</i></button>
                        <ul class="hidden-links hidden">
                        </ul>
                        </nav>
                    @endif

                    <ul class="sublist">
                        <li>
                            <div class="dropdown w230">
                              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                <span>Category</span>
                              <i class="category_img"></i></button>
                              <ul id="category_menu" class="dropdown-menu mega-menu">
                                <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <ul class="test">
                                     @foreach($categories as $category)
                                        <li>
                                            <a class="category" href="javascript:void(0);" class="comment" data-id="{{ $category->category_id }}">
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
                             <ul id="tag_menu" class="dropdown-menu mega-menu">
                                <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <ul>
                                        @foreach($tags as $tag)
                                        <li>
                                            <a class="tag" href="javascript:void(0);" data-id="{{ $tag->tag_id }}">
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
                              <ul id="theme_menu" class="dropdown-menu mega-menu">
                                <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <ul>
                                       @foreach($themes as $theme)
                                        <li>
                                            <a class="theme" href="javascript:void(0);" data-id="{{ $theme->theme_id }}">
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
                              <ul id="package_menu" class="dropdown-menu mega-menu">
                                <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <ul>
                                        @foreach($packages as $package)
                                        <li>
                                            <a class="package" href="javascript:void(0);" data-id="{{ $package->package_id }}">
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
     
       <?php $countdata =  $portfoliosdata->count();?>
        @foreach($portfoliosdata as $portfolio1)

        <?php //$postID = $portfolio1->portfolioid; ?>
         <?php $postID = $portfolio1->display_index; ?>
        <?php $techId = $portfolio1->technology; ?>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 gallery">
            <div class="hover ehover10">
                <img class="img-responsive" src="{{ URL::asset('template/frontend/images/'.$portfolio1->image) }}" alt="Title img" />
                <div class="point">
                    <p>
                        <a data-fancybox="images" href="{{ URL::asset('template/frontend/images/'.$portfolio1->image) }}" data-caption="Hitt">
                            <i class="zoom"></i>
                        </a>
                    </p>
                </div>
                <div class="overlay" style="background: #74bd30;">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <h2>{{ $portfolio1->title }}</h2>
                    <h3>Categories: -</h3>
                    <ul class="technology">
                        <li>
                            <a href="javascript:void(0);">
                                Wordpress
                            </a>
                        </li>        
                    </ul>
                    </div>
                     <a target="_blank" href="{{url('portfoliodetail/'.$portfolio1->portfolioid)}}" class="info">VIEW MORE</a>
                </div>
            </div>
        </div>
       
        
         @endforeach
        
        </div>
         <div class="load-more3" lastDataID="<?php echo $technologyid; ?>" style="display: none;"></div>
    <?php if($countdata >= 10){?>
        <div id="overlaycat" class="load-more1" lastcatID="<?php echo $techId; ?>" style="display: none;"></div>


        
         <div id="overlay" class="load-more" lastID="<?php echo $postID; ?>" style="display: none;">  
            <i class="fa fa-spinner fa-spin spin-big"></i>
        </div>
    <?php }else{ ?>
        <div id="overlaycat" class="load-more1" lastcatID=" " style="display: none;"></div>
        
         <div id="overlay" class="load-more" lastID=" " style="display: none;">  
            <i class="fa fa-spinner fa-spin spin-big"></i>
        </div>

   <?php  } ?>
       
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
            //alert();
            var lastID = $('.load-more').attr('lastID');
            //alert(lastID);
            var lastcatID = $('.load-more1').attr('lastcatID');
            //alert(lastcatID);

            //alert(Math.floor($(window).scrollTop())+"="+($(document).height() - $(window).height()))
            if(lastID){
                if(Math.floor($(window).scrollTop()) == $(document).height() - $(window).height()) {  
                    $.ajax({
                        type:'POST',
                        url:'{{ url("loadmore") }}',
                        data:'id='+lastID + '&catid=' + lastcatID,
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

    jQuery(document).ready(function(){
        var tokenid = $("#tokenid").val();
        //var technology = $('.load-more1').attr('lastcatID');
        //alert(technology);
          
            $('.greedy li a').click(function(e) {
               
                $('.greedy li a.selected1').removeClass('selected1');
                $(this).addClass('selected1');

                $(".button_all").css({"backgroundColor": "white", "color": "black"});

                getPortfolio();
                //var technology = jQuery(this).attr("data-id");
            });
        
            $('#category_menu li ul li a').click(function(e) {
                $(this).toggleClass("selected");
                getPortfolio();
                //var category = jQuery(this).attr("data-id");
            });
            $('#tag_menu li ul li a').click(function(e) {
                $(this).toggleClass("selected");
                getPortfolio();
                //var tag = jQuery(this).attr("data-id");
            });
            $('#theme_menu li ul li a').click(function(e) {
                $(this).toggleClass("selected");
                getPortfolio();
                //var theme = jQuery(this).attr("data-id");
            });
            $('#package_menu li ul li a').click(function(e) {
                $(this).toggleClass("selected");
                getPortfolio();
                //var package = jQuery(this).attr("data-id");
            });
            $(".portfolio-multi-site").click(function()
            {

                getPortfolio();
            });
            $(".portfolio-multi-theme").click(function()
            {

                getPortfolio();
            });
            function getPortfolio(){
                var tokenid = $("#tokenid").val();

                var data = '';
               var technologyid = $('.load-more3').attr('lastDataID');
               //alert(technologyid);
                 if(tokenid =="" || technologyid == "all")
                 {
                   
                    if($(".greedy ").find('li a.selected1'))
                    {
                        var technology = $(".greedy ").find('li a.selected1').data('id');
                       
                        if(technology !="")
                        {

                                if(data == '')
                                {
                                    data = 'technology='+technology;    
                                }
                                else
                                {
                                    data += '&technology='+technology;
                                }   
                        }
                    }

                 }else{

                     var technology = $('.load-more1').attr('lastDataID');
                     
                        if(data == '')
                        {
                            data = 'technology='+technology;    
                        }
                        else
                        {
                            data += '&technology='+technology;
                        } 
                 }
               
                if($("#category_menu li ul li").find('a.selected'))
                {
                    var category=[];
                    $('#category_menu a.selected').each(function () 
                    {
                        
                        category.push($(this).data('id'));
                    });
                    if(data == '')
                    {
                        data = 'category='+category; 
                    }else{
                        data += '&category='+category; 
                    }
                    
                }
                if($("#tag_menu li ul li").find('a.selected'))
                {
                    var tag=[];
                    $('#tag_menu a.selected').each(function () 
                    {
                        
                        tag.push($(this).data('id'));
                    });
                    if(data == '')
                    {
                        data = 'tag='+tag; 
                    }else{
                        data += '&tag='+tag; 
                    }

                }
                if($("#theme_menu li ul li").find('a.selected'))
                {
                    var theme=[];
                    $('#theme_menu a.selected').each(function () 
                    {
                        
                        theme.push($(this).data('id'));
                    });
                    if(data == '')
                    {
                        data = 'theme='+theme; 
                    }else{
                        data += '&theme='+theme; 
                    }
                   // alert(data)
                    
                }
                if($("#package_menu li ul li").find('a.selected'))
                {
                    var package=[];
                    $('#package_menu a.selected').each(function () 
                    {
                        
                        package.push($(this).data('id'));
                    });
                    if(data == '')
                    {
                        data = 'package='+package; 
                    }else{
                        data += '&package='+package; 
                    }
                    //alert(data)
                    
                }
                if ($('.portfolio-multi-site').is(':checked')) 
                {
                    var multisite = $('.portfolio-multi-site:checked').val(); 
                    if(multisite != '')
                    {
                        if(data == '')
                        {
                            data = 'multisite='+multisite;    
                        }
                        else
                        {
                            data += '&multisite='+multisite;
                        }
                    }
                    
                }
                if ($('.portfolio-multi-theme').is(':checked')) 
                {
                    var multiTheme = $('.portfolio-multi-theme:checked').val(); 
                    if(multiTheme != '')
                    {
                        if(data == '')
                        {
                            data = 'multitheme='+multiTheme;    
                        }
                        else
                        {
                            data += '&multitheme='+multiTheme;
                        }
                    }
                    
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
        
         
    }); 

</script>

  </body>
</html>
