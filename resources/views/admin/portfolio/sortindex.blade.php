@include('admin.includes.header');
<style>
ul {
	padding:0px;
	margin: 0px;
}
#response {
	padding:10px;
	color:#27A219;
	font-weight: bold;
	/*border:2px solid #396;*/
	margin-bottom:20px;
}
#list li {
	margin: 0 0 3px;
	padding:8px;
	background-color:#333;
	color:#fff;
	list-style: none;
}
.ajax-loader {
  visibility: hidden;
  background-color: rgba(255,255,255,0.7);
  position: absolute;
  z-index: 9999;
  width: 100%;
  height:100%;
  display: block;

}
.ajax-loader img {
  position: absolute;
  top:50%;
  left:50%;
}	                       
@-webkit-keyframes spin {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
}
@keyframes  spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
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
						<a href="#">Home</a>
					</li>
					<li class="active">Portfolio Index</li>
				</ul><!-- /.breadcrumb -->
					<!-- /.nav-search -->
			</div>
			<div class="page-content">
				<!-- /.ace-settings-container -->
				<div class="page-header">
					<h1>
						Portfolio Index
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							overview &amp; stats
						</small>
					</h1>
				</div><!-- /.page-header -->
					<!-- /.row -->
				
				<div class="row">
						<form action="" method="post">
						  <div id="list">
							{{ csrf_field() }}
						    <div id="response"></div>
						    <ul>
						    	
						    	@foreach ($sortindex as $sortindexs) 
						    	 
                                <li id="arrayindex_<?php echo $sortindexs->portfolioid ?>">{{ $sortindexs->display_index }} {{$sortindexs->title}} {{$sortindexs->technology}}
                                @endforeach
						      
						        <div class="clear"></div>
						        </li>
						      
						    </ul>
						  </div>
						</form>
				</div>
			</div><!-- /.page-content -->
		</div>
	</div><!-- /.main-content -->
@include('admin.includes.footer');
<script  src="{{ URL::asset('public/assets/js/grag.min.js') }}"></script>
<script  src="{{ URL::asset('public/assets/js/drop.min.js') }}"></script>
<script type="text/javascript">

$(document).ready(function(){ 	
		 
	function slideout(){
				  setTimeout(function(){
				  $("#response").slideUp("slow", function () {
				      });
				    
				}, 2000);} 
	
  $("#response").hide();
	$(function() {
	$("#list ul").sortable({ opacity: 0.8, cursor: 'move', update: function() 
	{
		    
			var order = $(this).sortable("serialize") + "&_token=" + $("input[name=_token]").val();
			$.ajax({
			  type:'POST',
			  beforeSend: function(){
			  	$('.ajax-loader').css("visibility", "visible");
			  },
			  url:"{{url('admin/portfolio/sortupdate')}}",
			  data: order,
			  success:function(data){
			        $('#response').html("All saved!");
          			var obj = JSON.parse(data)
                    $.each( obj, function( key, value ) {
                                                
                          $('#arrayindex_' + value.portfolioid).replaceWith("<li id='arrayindex_" + value.portfolioid + "'> " + value.display_index  + " " + value.title + value.technology + "</li>");
                          
                          
                    });

			  },
			  complete: function(){
			    $('.ajax-loader').css("visibility", "hidden");
			  }
			});

		}								  
		});
	});

});
</script>