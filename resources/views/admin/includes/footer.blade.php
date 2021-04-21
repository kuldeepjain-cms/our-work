<div class="footer">
</div>
	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
		<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
	</a>
</div><!-- /.main-container -->

	<!-- basic scripts -->

	<!--[if !IE]> -->
	<script src="{{ URL::asset('public/assets/js/jquery-2.1.4.min.js') }}"></script>

	<!-- <![endif]-->

	<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
	<script type="text/javascript">
		if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	</script>
	<script src="{{ URL::asset('public/assets/js/bootstrap.min.js') }}"></script>

	<!-- page specific plugin scripts -->
	<script src="{{ URL::asset('public/assets/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/buttons.flash.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/buttons.html5.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/buttons.print.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/buttons.colVis.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/dataTables.select.min.js') }}"></script>

	<!--[if lte IE 8]>
	  <script src="assets/js/excanvas.min.js"></script>
	<![endif]-->
	<script src="{{ URL::asset('public/assets/js/jquery-ui.custom.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery.ui.touch-punch.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery.sparkline.index.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery.flot.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery.flot.pie.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery.flot.resize.min.js') }}"></script>

	<!-- ace scripts -->
	<script src="{{ URL::asset('public/assets/js/ace-elements.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/ace.min.js') }}"></script>
	
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			/* datatable config start */
			jQuery(function($) {

				//initiate dataTables plugin
				if($('#dynamic-table').length > 0){
					var myTable = 
					$('#dynamic-table')
					//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
					.DataTable( {
						bAutoWidth: false,
						"aoColumns": [
						  { "bSortable": false },
						  null,null, null, null,null,
						  { "bSortable": false }
						],
						"aaSorting": [],
						
						
						//"bProcessing": true,
				        //"bServerSide": true,
				        //"sAjaxSource": "http://127.0.0.1/table.php"	,
				
						//,
						//"sScrollY": "200px",
						//"bPaginate": false,
				
						//"sScrollX": "100%",
						//"sScrollXInner": "120%",
						//"bScrollCollapse": true,
						//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
						//you may want to wrap the table inside a "div.dataTables_borderWrap" element
				
						//"iDisplayLength": 50
				
				
						select: {
							style: 'multi'
						}
				    } );
				}
				if($('#dynamic-table-accesstoken').length > 0){
					var myAccessTokenTable = 
					$('#dynamic-table-accesstoken')
					//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
					.DataTable( {
						bAutoWidth: false,
						"aoColumns": [
						  { "bSortable": false },
						  null,null, null, null,
						  { "bSortable": false }
						],
						"aaSorting": [],
						
						
						//"bProcessing": true,
				        //"bServerSide": true,
				        //"sAjaxSource": "http://127.0.0.1/table.php"	,
				
						//,
						//"sScrollY": "200px",
						//"bPaginate": false,
				
						//"sScrollX": "100%",
						//"sScrollXInner": "120%",
						//"bScrollCollapse": true,
						//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
						//you may want to wrap the table inside a "div.dataTables_borderWrap" element
				
						//"iDisplayLength": 50
				
				
						select: {
							style: 'multi'
						}
				    } );
				}
				if($('#dynamic-table-category').length > 0){
				    $('#dynamic-table-category')
					//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
					.DataTable( {
						bAutoWidth: false,
						"aoColumns": [
						  { "bSortable": true },
						  
						  { "bSortable": false }
						],
						"aaSorting": [],
						
						
						//"bProcessing": true,
				        //"bServerSide": true,
				        //"sAjaxSource": "http://127.0.0.1/table.php"	,
				
						//,
						//"sScrollY": "200px",
						//"bPaginate": false,
				
						//"sScrollX": "100%",
						//"sScrollXInner": "120%",
						//"bScrollCollapse": true,
						//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
						//you may want to wrap the table inside a "div.dataTables_borderWrap" element
				
						//"iDisplayLength": 50
				
				
						select: {
							style: 'multi'
						}
				    } );
				}
				if($('#dynamic-table-technology').length > 0){
				    $('#dynamic-table-technology')
					//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
					.DataTable( {
						bAutoWidth: false,
						"aoColumns": [
						  { "bSortable": true },
						  
						  { "bSortable": false }
						],
						"aaSorting": [],
						
						
						//"bProcessing": true,
				        //"bServerSide": true,
				        //"sAjaxSource": "http://127.0.0.1/table.php"	,
				
						//,
						//"sScrollY": "200px",
						//"bPaginate": false,
				
						//"sScrollX": "100%",
						//"sScrollXInner": "120%",
						//"bScrollCollapse": true,
						//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
						//you may want to wrap the table inside a "div.dataTables_borderWrap" element
				
						//"iDisplayLength": 50
				
				
						select: {
							style: 'multi'
						}
				    } );
				}
				if($('#dynamic-table-tag').length > 0){
				    $('#dynamic-table-tag')
					//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
					.DataTable( {
						bAutoWidth: false,
						"aoColumns": [
						  { "bSortable": true },
						  
						  { "bSortable": false }
						],
						"aaSorting": [],
						
						
						//"bProcessing": true,
				        //"bServerSide": true,
				        //"sAjaxSource": "http://127.0.0.1/table.php"	,
				
						//,
						//"sScrollY": "200px",
						//"bPaginate": false,
				
						//"sScrollX": "100%",
						//"sScrollXInner": "120%",
						//"bScrollCollapse": true,
						//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
						//you may want to wrap the table inside a "div.dataTables_borderWrap" element
				
						//"iDisplayLength": 50
				
				
						select: {
							style: 'multi'
						}
				    } );
				}
				if($('#dynamic-table-server').length > 0){
				    $('#dynamic-table-server')
					//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
					.DataTable( {
						bAutoWidth: false,
						"aoColumns": [
						  { "bSortable": true },
						  
						  { "bSortable": false }
						],
						"aaSorting": [],
						
						
						//"bProcessing": true,
				        //"bServerSide": true,
				        //"sAjaxSource": "http://127.0.0.1/table.php"	,
				
						//,
						//"sScrollY": "200px",
						//"bPaginate": false,
				
						//"sScrollX": "100%",
						//"sScrollXInner": "120%",
						//"bScrollCollapse": true,
						//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
						//you may want to wrap the table inside a "div.dataTables_borderWrap" element
				
						//"iDisplayLength": 50
				
				
						select: {
							style: 'multi'
						}
				    });
				}
				if($('#dynamic-table-theme').length > 0){
				    $('#dynamic-table-theme')
					//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
					.DataTable( {
						bAutoWidth: false,
						"aoColumns": [
						  { "bSortable": true },
						  
						  { "bSortable": false }
						],
						"aaSorting": [],
						
						
						//"bProcessing": true,
				        //"bServerSide": true,
				        //"sAjaxSource": "http://127.0.0.1/table.php"	,
				
						//,
						//"sScrollY": "200px",
						//"bPaginate": false,
				
						//"sScrollX": "100%",
						//"sScrollXInner": "120%",
						//"bScrollCollapse": true,
						//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
						//you may want to wrap the table inside a "div.dataTables_borderWrap" element
				
						//"iDisplayLength": 50
				
				
						select: {
							style: 'multi'
						}
				    } );
				}
				if($('#dynamic-table-packages').length > 0){
				    $('#dynamic-table-packages')
					//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
					.DataTable( {
						bAutoWidth: false,
						"aoColumns": [
						  { "bSortable": true },
						  
						  { "bSortable": false }
						],
						"aaSorting": [],
						
						
						//"bProcessing": true,
				        //"bServerSide": true,
				        //"sAjaxSource": "http://127.0.0.1/table.php"	,
				
						//,
						//"sScrollY": "200px",
						//"bPaginate": false,
				
						//"sScrollX": "100%",
						//"sScrollXInner": "120%",
						//"bScrollCollapse": true,
						//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
						//you may want to wrap the table inside a "div.dataTables_borderWrap" element
				
						//"iDisplayLength": 50
				
				
						select: {
							style: 'multi'
						}
				    } );
				}
				if($('#dynamic-table-payment-method').length > 0){
				    $('#dynamic-table-payment-method')
					//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
					.DataTable( {
						bAutoWidth: false,
						"aoColumns": [
						  { "bSortable": true },
						  
						  { "bSortable": false }
						],
						"aaSorting": [],
						
						
						//"bProcessing": true,
				        //"bServerSide": true,
				        //"sAjaxSource": "http://127.0.0.1/table.php"	,
				
						//,
						//"sScrollY": "200px",
						//"bPaginate": false,
				
						//"sScrollX": "100%",
						//"sScrollXInner": "120%",
						//"bScrollCollapse": true,
						//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
						//you may want to wrap the table inside a "div.dataTables_borderWrap" element
				
						//"iDisplayLength": 50
				
				
						select: {
							style: 'multi'
						}
				    } );
				}

				if($('#dynamic-table-client').length > 0){
				    $('#dynamic-table-client').DataTable( {
						bAutoWidth: false,
						"aoColumns": [
						  { "bSortable": true },
						  null,
						  { "bSortable": false }
						],
						"aaSorting": [],
						
						
						//"bProcessing": true,
				        //"bServerSide": true,
				        //"sAjaxSource": "http://127.0.0.1/table.php"	,
				
						//,
						//"sScrollY": "200px",
						//"bPaginate": false,
				
						//"sScrollX": "100%",
						//"sScrollXInner": "120%",
						//"bScrollCollapse": true,
						//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
						//you may want to wrap the table inside a "div.dataTables_borderWrap" element
				
						//"iDisplayLength": 50
				
				
						select: {
							style: 'multi'
						}
				    });
				}
			    
			});
		</script>
	</body>
</html>
