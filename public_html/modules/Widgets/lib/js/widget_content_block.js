$(function() {

    $('ul.sortable-widgets').each(function() {
        var $parent = $(this).closest('.widget-cb');
        var $selected = $parent.find('ul.selected-widgets');
        $(this).sortable({
            connectWith: $selected,
            delay: 150,
            revert: 300,
            placeholder: 'ui-state-highlight',
            items: 'li:not(.no-sort)',
            helper: function (event, ui) {
                if (!ui.hasClass('selected')) {
                    ui.addClass('selected')
                      .siblings()
                      .removeClass('selected');
                }
                var elements = ui.parent()
                                 .children('.selected')
                                 .clone(),
                    helper = $('<li/>');
                ui.data('multidrag', elements).siblings('.selected').remove();
                return helper.append(elements);
            },
            stop: function (event, ui) {
                var elements = ui.item.data('multidrag');
                var $ulSelected = $(ui.item).parent();
                ui.item.after(elements).remove();
                updateWidgetCBInput($ulSelected);
            },
            receive: function(event, ui) {
                var elements = ui.item.data('multidrag');
                $(ui.item).parent().children('.placeholder').addClass('hidden');
                $(elements).removeClass('selected ui-state-hover')
                           .find('.sortable-remove').removeClass('hidden');
            }
        });
    });

    // remove from selected list
    $(document).on('click', '#selected-widgets .sortable-remove', function(e) {
        var $ulSelected = $(this).closest('ul.selected-widgets');
        var $ulAvailable = $(this).closest('.widget-cb').find('.available-widgets');
        $(this).addClass('hidden')
               .parent('li').removeClass('no-sort')
               .appendTo($ulAvailable);
        updateWidgetCBInput($ulSelected);

        if ( $($ulSelected).children().length==1 )
            $ulSelected.children('.placeholder').removeClass('hidden');
        e.preventDefault();
    });

    function updateWidgetCBInput($ulSelected) {
        var $allSelected = $ulSelected.children('li:not(.placeholder)');
        var $targetInput = $( '#' + $ulSelected.data('cmsms-cb-input') );
        var selectedStr = '';
        $allSelected.each(function() {
            if (selectedStr=='') {
                selectedStr = $(this).data('cmsms-item-id');
            } else {
                selectedStr = selectedStr+','+$(this).data('cmsms-item-id');
            }
        });
        $targetInput.val(selectedStr);
    }

});
