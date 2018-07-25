/*
 * fancyBox Facebook helper
 *
 * Usage: 
 *     $('.fancybox').fancybox({
 *         facebook: {
 *             url : 'http://www.blah.com/blah'
 *         }
 *     });
 */
(function ($) {
    $.fancybox.helpers.facebook = {
        facebook: null,
        afterShow: function (opts) {
            this.facebook = $('<div style="padding:5px;"><iframe src="http://www.facebook.com/plugins/like.php?href='+ opts.url +'&layout=button_count&node_type=link&send=true&show_faces=false&width=200" scrolling="no" frameborder="0" style="border:none; width:200px; height:20px"></iframe></div>').appendTo($.fancybox.wrap);
        },
        beforeClose: function () {
            if (this.facebook) {
                $(this.facebook).remove();
            }
        }
    };
}(jQuery));