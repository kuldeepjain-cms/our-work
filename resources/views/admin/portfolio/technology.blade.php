<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">            

            <!-- start: metrics table -->

            <div id="metrics-tables">
                
                <div class="table-responsive table-wrapper table-mobile">
                    <table class="table table-hover table-bordered fixed-head-table">
                        <thead>
                            <tr>
                                <th width="10%">Technology Id</th>
                                <th width="10%">Technology Name</th>
                                
                                
                            </tr>

                        </thead>
                        <tbody>
	                        
	                    
	                   <?php
	                   foreach($technology['technology'] as $newdata)
		            	{ ?>
		            		
		            		<tr>
		            			<td> {{ $newdata->technology_id }} </td>
		            			<td> {{ $newdata->technology_name }} </td>
		            			
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