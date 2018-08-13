

jQuery(document).ready(function($){
    var custom_uploader;

    $('body').on('click', '.upload_image_button', function(e) {
        e.preventDefault();

        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: true
        });
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            $('.upload_image').val(attachment.url);
            $('.about_author-hide').removeClass('about_author-hide');
            $('.upload_image_button').addClass('about_author-hide');
            $('.about_author-img_src').attr('src',attachment.url );
        });


        custom_uploader.open();
    });
    $('body').on('click', '.remove_image_button', function(e) {
        $('.upload_image').val();
        $('.about_author-hide').removeClass('about_author-hide');
        $('.remove_image_button').addClass('about_author-hide');
        $('.upload_image').addClass('about_author-hide');
        $('about_author-wrapper ').addClass('about_author-hide');
        $('.about_author-img').addClass('about_author-hide');
        $('.about_author-img_src').attr('src','')
        
    });

});