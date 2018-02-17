/**
 * Created by Jigar Kumar on 2/15/2018.
 */


$(".wishlistClass").on("click", function () {
    if (isLoggedIn == 1) {
        var $this = $(this);
        $.ajax({
            url: $this.attr('data-url'),
            type: 'get',
            dataType: 'json',
            cache: false,
            success: function (data) {
                msgType = data.type == 1 ? 'success' : 'danger';
                msg = '';
                actionType = $this.attr('data-type');
                reactionType = actionType == 'add' ? 'remove' : 'add';
                if (actionType == 'remove') {
                    if (data.type == 1) {
                        msg = 'Ad has been removed in your wishlist';
                        $id = $this.attr('data-id');
                        $('#wishList' + $id).attr({
                            'data-original-title': 'Add Wishlist',
                            'data-url': data.url,
                            'data-type': reactionType
                        }).removeClass('btnHoverCls');
                    } else if (data.type == 0) {
                        msg = 'Oops, Something wrong happened. Please try again.';
                    }
                } else if (actionType == 'add') {
                    if (data.type == 1) {
                        msg = 'Ad has been added in your wishlist';
                        $id = $this.attr('data-id');
                        $('#wishList' + $id).attr({
                            'data-original-title': 'Remove Wishlist',
                            'data-url': data.url,
                            'data-type': reactionType
                        }).addClass('btnHoverCls');
                    } else if (data.type == 0) {
                        msg = 'Oops, Something wrong happened. Please try again.';
                    } else if (data.type == -1) {
                        msg = 'You can not save your ad in your wishlist';
                    } else if (data.type == -2) {
                        msg = 'This Ad has already added in your wishlist';
                    }
                }
                $.toaster({priority: msgType, message: msg});
            }
        });
    } else {
        $.toaster({priority: 'danger', message: 'You must be login'});
    }
});