/*
jQuery.noConflict();
*/
	function preview(img, selection) {
		var thumbwidth = $('#currentthumb').width();
		var scale = thumbwidth / (selection.width || 1);

		$('#thumbpreview').css({
			width: Math.round(scale * img.width) + 'px',
			height: Math.round(scale * img.height) + 'px',
			marginLeft: '-' + Math.round(scale * selection.x1) + 'px',
			marginTop: '-' + Math.round(scale * selection.y1) + 'px'
		});
	}
	function changethumb() {
		ias.setOptions({ aspectRatio: $('#currentthumb').width() + ':' + $('#currentthumb').height(), handles: true });
		$('#thumbpreviewcontainer').css({
			width: $('#currentthumb').width() + 'px',
			height: $('#currentthumb').height() + 'px'
		});
		$('#thumbpreview').css({
			width: $('#currentthumb').width() + 'px',
			height: $('#currentthumb').height() + 'px'
		});
	}

$(document).ready(function() {
	$('#gtree').treeTable();
	$('#gtree tr.initialized:odd').addClass('row1');
	$('#gtree tr.initialized:even').addClass('row2');
	$('#gtable tr, #gtree tr').hover(function(){
		$(this).stop().addClass('row1hover');
	}, function(){
		$(this).stop().removeClass('row1hover');
	});
	$('#gtable').tableDnD({
		onDragStart: function(table,row) {
			$('#gtable tr').removeClass();
		},
		onDragClass: "row1hover",
		onDrop: function(table, row) {
			$('#gtable tr:odd').addClass('row1');
			$('#gtable tr:even').addClass('row2');
			var rows = table.tBodies[0].rows;
			var sortstr = rows[0].id;
			for (var i=1; i<rows.length; i++) {
				sortstr += ","+rows[i].id;
			}
			$('#sort input').val(sortstr);
		}
	});

	$('input#selectall').click(function() {
		$('.checkbox input').attr('checked',$(this).is(':checked'));
	});

	$('#multiaction').change(function() {
		if ($('#multiaction').val() == 'move')
		{
			$('#moveto').show('slow');
		}
		else
		{
			$('#moveto').hide('slow');
		}
	});
	$('#multiaction').change();

	$('a#addfield').click(function() {
		var htmlStr = $('.sortfield').html();
				htmlStr = htmlStr.replace(/ selected="selected"/g, '');
		$('<p class="sortfield">' + htmlStr + '</p>').appendTo('#sortfields');
		return false;
	});
	$('a#deletefield').click(function() {
		if($('.sortfield').size() > 1) {
			$('.sortfield:last').remove();
		}
		return false;
	});

});
