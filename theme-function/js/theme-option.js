document.addEventListener('DOMContentLoaded', (event) => {
    const authorImageButton = document.querySelector('#spk-img-btn');
    const authorImagePreview = document.querySelector('#spk-author-img-preview');
    const authorImageInput = document.querySelector('#spk_author_img');


    const mediaFrame = wp.media({
        title: "Select or Upload Media",
        button: {
            text: "Use this media",
        },
        multiple: false
    });

    authorImageButton.addEventListener('click', event => {
        event.preventDefault();
        // Open the popup
        mediaFrame.open();
    })

    mediaFrame.on("select", () => {
        // mediaFrame.state() - Return all media data
        // get("selection") - Select item from array
        // First() - Select first item from array and convert array data into json using toJSON
        console.log();
        const attachment = mediaFrame.state().get('selection').first().toJSON(); 
        authorImagePreview.src = attachment.url;
        authorImageInput.value = attachment.url;
        // console.log(authorImagePreview.src);
    });

});




// Create Custom Event Using on() function



// (function( $ ) {
// 	'use strict';

// 	$(function() {
		
// 		$('#upload_image').click(open_custom_media_window);

// 		function open_custom_media_window() {
// 			if (this.window === undefined) {
// 				this.window = wp.media({
// 					title: 'Insert Image',
// 					library: {type: 'image'},
// 					multiple: false,
// 					button: {text: 'Insert Image'}
// 				});

// 				var self = this;
// 				this.window.on('select', function() {
// 					var response = self.window.state().get('selection').first().toJSON();
//                     console.log(response);
// 					$('.wp_attachment_id').val(response.id);
// 					$('.image').attr('src', response.url);
//                      $('.image').show();
// 				});
// 			}

// 			this.window.open();
// 			return false;
// 		}
// 	});
// })( jQuery );

document.addEventListener('DOMContentLoaded', (event) => {
    const tabs = document.querySelector('.tabs');
    const tabButtons = tabs.querySelectorAll('[role="tab"]');
    const tabPanels = tabs.querySelectorAll('[role="tabpanel"]');   
    tabButtons.forEach(button => button.addEventListener('click', handleTabClick));
    
    function handleTabClick(event) {          
    // hide all tab panels
    tabPanels.forEach(panel => {
        panel.hidden = true;
    });

    // mark all tabs as unselected
    tabButtons.forEach(tab => {
        // tab.ariaSelected = false;
        tab.setAttribute('aria-selected', false);              
    });

    // mark the cli cked tab as selected
    event.currentTarget.setAttribute('aria-selected', true);
    const id = event.currentTarget.id
    const tabPanel = tabs.querySelector(`[aria-labelledby="${id}"]`);
    // console.log(tabPanel);
    tabPanel.hidden = false;

    }     
});


jQuery(document).ready(function($) {
    $('#input#upload_image_button').click(function() {
        console.log('heloo');
        tb_show('Upload a logo', 'media-upload.php?referer=wptuts-settings&type=image&TB_iframe=true&post_id=0', false);
        return false;
    });
});

window.send_to_editor = function(html) {
    var image_url = $('img',html).attr('src');
    $('#logo_url').val(image_url);
    tb_remove();
    $('#upload_logo_preview img').attr('src',image_url);
	$('#submit_options_form').trigger('click');
}


