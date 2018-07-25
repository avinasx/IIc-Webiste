// widgets_admin.js
$(function() {
   $('.sortable-widget-list').sortable({
      delay: 150,
      revert: 300,
      placeholder: 'ui-state-highlight',
      helper: function (event, ui) {
         ui.children().each(function() { // fixes width & height of dragged cells
            $(this).width($(this).width()).height($(this).height());
         });
         return ui;
      },
      stop: function (event, ui) {
         $(ui.item).parent().children().each(function( index ) {
            $(this).removeClass('row1 row2').addClass('row'+(index%2+1));
         });
         var moveToAfter = $(ui.item).prev('tr').data('id');
         if (typeof moveToAfter=='undefined') {
            moveToAfter = '_after=' + '0';
         } else {
            moveToAfter = '_after=' + moveToAfter;
         }
         var reorderUrl = $(ui.item).data('reorder').replace('_after=-1', moveToAfter) + '&showtemplate=false';
         var loadingIcon = $('#loader').data('icon');
         if (loadingIcon!='') {
            loadingIcon = '<img src="'+loadingIcon+'" alt="updating">';
         } else {
            loadingIcon = 'updating';
         }
         $('#loader').html(loadingIcon).load( reorderUrl );
      }
   });

});

