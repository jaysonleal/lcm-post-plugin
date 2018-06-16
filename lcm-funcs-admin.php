<?php
/*
Lights Camera Manila is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Lights Camera Manila is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Lights Camera Manila. If not, see https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html.

Text Domain: ligihts-camera-manila-post-plugin
*/

include_once(ABSPATH . 'wp-includes/pluggable.php');

if ( ! function_exists( 'post_exists' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/post.php' );
}


if ( ! function_exists( 'metadata_exists' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/post.php' );
}

add_action('admin_menu', 'my_menu_pages');

function my_menu_pages(){
    add_menu_page('LCM POST', 
    			  'LCM POST Plugin', 
    			  'manage_options', 
    			  'post-table', 
    			  'saveThisToWordPress' );
    
    add_submenu_page('post-table',
    				 'LCM Post Table', 
    				 'LCM Post Table', 
    				 'manage_options', 
    				 'post-table',
    				 'lcmPostTable' );
}

function saveThisToWordPress($rows){
global $wpdb;
	
	//connect to query to other database to get data
	$newdb = new wpdb( 'root', '', 'media_db', 'localhost' );
	$res = $newdb->get_results("SELECT MEDIA_NAME, MEDIA_ID , client_id FROM media_tbl WHERE client_id = 7  ORDER BY MEDIA_ID DESC"); 
	$data = array();
	
	foreach ($res as $row){
		$data[] = (array)$row;	
	}
	// Query to check of meta data and post has already exist
	foreach($data as $rows){
	// echo ($row["MEDIA_NAME"]. " , " . "ID:   " .$row["MEDIA_ID"] . "<br>");
		if( ! metadata_exists( $rows['MEDIA_NAME'], $rows['MEDIA_ID'], 'lcm_video_file')){
			if( ! post_exists ($rows['MEDIA_NAME'])){
				saveThisToWordPress($rows);
			}
		}  
	}
	//function to insert new post to the db of wordpress
	$post_id = wp_insert_post(
 		array(
 			
			'post_title' => $rows["MEDIA_NAME"],
			'post_content' => $rows["MEDIA_NAME"],
			'post_status' => "draft",
			'post_author' => 1,
			'post_type' => "post",
			'post_category' => array(1),
			'tax_input' => array('post_format' => 'post-format-video')
 		)
 	);
	
	//add post meta data of the added post
	add_post_meta($rows['MEDIA_ID'], 'lcm_video_file', "http://whoatranscoded.s3.amazonaws.com/scheduler/lightscameramanila/files/source/" . urlencode($rows['MEDIA_NAME']), $unique = true );
} ?>

<!-- This function if to display the list of POST from the other database -->
<?php function lcmPostTable(){ ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
<form id="post-filter" method="get">
	<div class="wrap">
	  	<h2>Lights Camera Manila Post</h2>
		<div class="metabox-holder">
	    	<div class="postbox">  
	      		<br><br>
	      		<table id="myTable" class="table table-striped table-bordered" style="width: 100%">
					<thead>
						<tr>
					    	<th>POST ID</th>
					    	<th>TITLE</th>
					    	<th>DATE ADDED</th>
					    	<th>DATE MODIFIED</th>
					    	<th>STATUS</th>
					    	<th>ACTION</th>
					    </tr>
					</thead>
			  		
			  		<tbody>	
					 			
					  	<?php
					  	global $wpdb;
					  	$results = $wpdb->get_results( "SELECT * FROM $wpdb->posts WHERE post_type = 'post'", ARRAY_A  );
					  	$datas = array();
						foreach ($results as $row1) {
							$datas[] = (array)$row1;
						}
						?>	
					    <?php foreach($datas as $row12){?>
					    <tr>
					    <td>
					    	<?php echo $row12['ID'];?>
					    </td>	
					    <td>
							<?php echo $row12['post_title'];?>		
					    </td>
					    <td>
					    	<?php echo $row12['post_date'];?>
					    </td>
					    <td>
					    	<?php echo $row12['post_modified'];?>
					    </td>
					    <td> <?php echo $row12['post_status'];?> </td>
					    	<?php 
					    	$results = $wpdb->get_results( "select *from $wpdb->posts where ID = '". $row12['ID'] . "'", ARRAY_A  );
					    	$urls = $results[0]['ID'];
					    	
					    	echo "<td><a href=\"/wp-admin/post.php?post=$urls&action=edit\">Edit</a>";
					    	?>
					    </tr>
					    <?php } ?>	
		
					</tbody>
					</table>
					<br>
	    	</div>
	  	</div>
	</div>
</form>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<!-- Script of the dataTable -->
<script>
    $(document).ready( function () {
    	$('#myTable').DataTable({
    	responsive : true,
    	paging: true,
    	ordering: true,
    	searching: true
    }	);
	} );
</script>
<?php } ?>
