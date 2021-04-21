<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">            

            <!-- start: metrics table -->

            <div id="metrics-tables">
                
                <div class="table-responsive table-wrapper table-mobile">
                    <table class="table table-hover table-bordered fixed-head-table">
                        <thead>
                            <tr>
                                <th width="10%">Server Id</th>
                                <th width="10%">Server Name</th>
                                
                                
                            </tr>

                        </thead>
                        <tbody>
	                        
	                    
	                   <?php
	                   foreach($server['server'] as $newdata)
		            	{ ?>
		            		
		            		<tr>
		            			<td> {{ $newdata->server_id }} </td>
		            			<td> {{ $newdata->server_name }} </td>
		            			
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