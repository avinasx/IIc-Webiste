jQuery(document).ready(function($) {

	$(".module_fb_table").tableDnD({
	
		onDragClass: "row1hover",
		onDrop: function(table, row) {
		
				var totalrows = jQuery(".module_fb_table").find("tbody tr").size();
				
				jQuery(".module_fb_table").find("tbody tr").removeClass();
				jQuery(".module_fb_table").find("tbody tr:nth-child(2n+1)").addClass("row1");
				jQuery(".module_fb_table").find("tbody tr:nth-child(2n)").addClass("row2");
				
				var rows = table.tBodies[0].rows;
				var sortstr = rows[0].id;
				for (var i=1; i<rows.length; i++) {
					sortstr += ","+rows[i].id;
				}
				
				$('.fbrp_sort').val(sortstr);
				//$('.reordermessage').show();
		}
	});
    jQuery(".updown").hide();
});