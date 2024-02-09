$(document).ready(function() {
    var stars = $('star');
    var ratingInput = $('#rating-input');

    stars.on('click', function() {
        var rating = $(this).data('rating');
        ratingInput.val(rating);

        stars.removeClass('selected');

        $(this).addClass('selected');
        $(this).prevAll('star').addClass('selected');
    })

    $(".user_option").click(function() {
        $(".user-menu").toggle()
    })

    $(".product_item").on('click', function() {
        let id = $(this).attr('id');

        $.ajaxSetup({
            'headers': {
                'X-CSRF-TOKEN': $("meta[name='_token']").attr('content')
            }
        });

        $(this).LoadingOverlay('show');

        $ajax({
            type: "POST",
            url: "add-to-cart/" + id,
            dataType: 'html',
            data: { 'productId': id },
            success: function(data) {
                if (data != null) {
                    $('#cart_content').html(data);
                    $('.product_item').LoadingOverlay('hide', true);

                    swal({
                        title: "Item added to cart",
                        text: "Successfully",
                        timer: 2000,
                        buttons: false
                    });
                } else {
                    alert('Please check Connection');
                }
            }
        })
    })
})