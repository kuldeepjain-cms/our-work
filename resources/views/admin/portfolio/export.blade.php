<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">            

            <!-- start: metrics table -->

            <div id="metrics-tables">
                
                <div class="table-responsive table-wrapper table-mobile">
                    <table class="table table-hover table-bordered fixed-head-table">
                        <thead>
                            <tr>
                                <th width="10%">portfolioid</th>
                                <th width="10%">title</th>
                                <th width="10%">client name</th>
                                <th width="10%">content</th>
                                <th width="10%">category</th>
                                <th width="10%">technology</th>
                                <th width="10%">display_index</th>
                                <th width="10%">tags</th>
                                <th width="10%">site_link</th>
                                <th width="10%">image</th>
                                <th width="10%">created_at</th>
                                <th width="10%">updated_at</th>
                                <th width="10%">web_server</th>
                                <th width="10%">theme</th>
                                <th width="10%">js_css_packages</th>
                                <th width="10%">payment_methods</th>
                                <th width="10%">multi_theme</th>
                                <th width="10%">multi_sites</th>
                                <th width="10%">duration</th>
                                <th width="10%">addons</th>
                            </tr>
                        </thead>
                        <tbody>
	                        
	                    
	                   <?php
	                   foreach($portfolio['portfolio'] as $newdata)
		            	{ ?>
		            		<tr>
		            			<td> {{ $newdata->portfolioid }} </td>
		            			<td> {{ $newdata->title }} </td>
                                <td> {{ $newdata->client_name }} </td>
		            			<td> {{ $newdata->content }} </td>
		            			<td> {{ $newdata->category }} </td>
		            			<td> {{ $newdata->technology }} </td>
		            			<td> {{ $newdata->display_index }} </td>
		            			<td> {{ $newdata->tags }} </td>
		            			<td> {{ $newdata->site_link }} </td>
		            			<td> {{ $newdata->image }} </td>
		            			<td> {{ $newdata->created_at }} </td>
		            			<td> {{ $newdata->updated_at }} </td>
		            			<td> {{ $newdata->web_server }} </td>
		            			<td> {{ $newdata->theme }} </td>
		            			<td> {{ $newdata->js_css_packages }} </td>
		            			<td> {{ $newdata->payment_methods }} </td>
		            			<td> {{ $newdata->multi_theme }} </td>
		            			<td> {{ $newdata->multi_sites }} </td>
		            			<td> {{ $newdata->duration }} </td>
		            			<td> {{ $newdata->addons }} </td>
		            		</tr>
		            	<?php
		            	}
		            	?>
	                   
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- end: metrics table -->
            


        </div>
    </div>
</div>