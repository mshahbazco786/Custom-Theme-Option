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

    // CREATE SIDE BAR TABS FOR THEME OPTIONS
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
