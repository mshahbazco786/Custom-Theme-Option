<?php

/**
 *  
 *  CREATE CALLBACK Function
 * 
 */

?>
<form novalidate="novalidate" method="POST" action="admin-post.php">                     
    <div role="tabpanel" aria-labelledby="header">
        <!-- Associate the data with our form by adding a hidden input with name called action. Without the input will not be able to process the form -->
        <input type="hidden" name="action"  value="spk_theme_save_options" />
        <!-- To security we always add nonce. A value taht can only be used once. pass id to procceed to update the input -->
        <?php wp_nonce_field('spk_theme_option_varify'); ?>
        <table class="form-table">            
            <tr valign="top">
                <th scope="row">Select Header</th>
                <td>
                    <select name="select_header_layout">
                        <option value="header_layout_1" <?php selected($options['select_header_layout'], "header_layout_1"); ?>>Header1</option>
                        <option value="header_layout_2" <?php selected($options['select_header_layout'], "header_layout_2"); ?>>Header2</option>
                        <option value="header_layout_3" <?php selected($options['select_header_layout'], "header_layout_3"); ?>>Header3</option>
                        <option value="header_layout_4" <?php selected($options['select_header_layout'], "header_layout_4"); ?>>Header4</option>
                        <option value="header_layout_5" <?php selected($options['select_header_layout'], "header_layout_5"); ?>>Header5</option>
                        <option value="header_layout_6" <?php selected($options['select_header_layout'], "header_layout_6"); ?>>Header6</option>
                        <option value="header_layout_7" <?php selected($options['select_header_layout'], "header_layout_7"); ?>>Header7</option>
                    </select>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Select Header Background Color</th>                
                <td>                
                    <input type="color" name="header_bg_color" value="<?= $options['header_bg_color']; ?>">                   
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Body Text Color</th>                
                <td>                
                    <input type="color" name="body_text_color" value="<?= $options['body_text_color']; ?>">                   
                </td>
            </tr>
        </table>
    </div>
    <div role="tabpanel" aria-labelledby="footer" hidden>        
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Select Footer</th>
                <td>
                    <select name="select_footer_layout">
                        <option value="footer_layout1" <?php selected($options['select_footer_layout'], "footer_layout1"); ?>>Footer1</option>
                        <option value="footer_layout2" <?php selected($options['select_footer_layout'], "footer_layout2"); ?>>Footer2</option>
                        <option value="footer_layout3" <?php selected($options['select_footer_layout'], "footer_layout3"); ?>>Footer3</option>
                        <option value="footer_layout4" <?php selected($options['select_footer_layout'], "footer_layout4"); ?>>Footer4</option>
                        <option value="footer_layout5" <?php selected($options['select_footer_layout'], "footer_layout5"); ?>>Footer5</option>
                        <option value="footer_layout6" <?php selected($options['select_footer_layout'], "footer_layout6"); ?>>Footer6</option>
                        <option value="footer_layout7" <?php selected($options['select_footer_layout'], "footer_layout7"); ?>>Footer7</option>
                    </select> 
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Select Footer BG Color</th>                
                <td>                
                    <input type="color" name="footer_bg_color" value="<?= $options['footer_bg_color']; ?>">                   
                </td>
            </tr>      
            <tr valign="top">
                <th scope="row">Footer Logo Description</th>                
                <td>                
                    <textarea name="footer_logo_description" id="" cols="60" rows="2">
                        <?= $options['footer_logo_description']; ?>
                    </textarea>                        
                </td>
            </tr>        
            <tr valign="top">
                <th scope="row">Company Address</th>                
                <td>                
                    <textarea name="address" id="" cols="60" rows="2">
                        <?= $options['address']; ?>
                    </textarea>                        
                </td>
            </tr>   
            <tr valign="top">
                <th scope="row">Office Hours Lable</th>                
                <td>    
                    <input type="text" name="office_hours_lable" value="<?= $options['office_hours_lable']; ?>" />                                                 
                </td>
            </tr>  
            <tr valign="top">
                <th scope="row">Office Hours</th>                
                <td>           
                    <input type="text" name="office_hours" value="<?= $options['office_hours']; ?>" />                                          
                </td>
            </tr>   
            <tr valign="top">
                <th scope="row">Working Days</th>                
                <td> 
                    <input type="text" name="working_days" value="<?= $options['working_days']; ?>" />                                             
                </td>
            </tr> 
            <tr valign="top">
                <th scope="row">Newslatter Description</th>                
                <td>                
                    <textarea name="top_newslatter_description" id="" cols="60" rows="2">
                        <?= $options['top_newslatter_description']; ?>
                    </textarea>                        
                </td>
            </tr>     
            <tr valign="top">
                <th scope="row">Copyright</th>                
                <td>                
                    <textarea name="copyright_text" id="" cols="60" rows="2">
                        <?= $options['select_footer_layout']; ?>
                    </textarea>                        
                </td>
            </tr>
        </table>                
    </div>                 
    <div role="tabpanel" aria-labelledby="autor_box" hidden>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Choose Author Image</th>                
                <td>                
                    <input type="hidden" name="author_img" id="spk_author_img" value="<?= esc_attr($options['author_img']) ?>"/>
                    <img id="spk-author-img-preview" src="<?= esc_attr($options['author_img']) ?>">
                    <a href="#" class="button-primary" id="spk-img-btn">Select Image</a>                  
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Author Description</th>                
                <td>                
                    <textarea name="author_img_description" id="" cols="60" rows="2">
                        <?= $options['author_img_description']; ?>
                    </textarea>                        
                </td>
            </tr>
        </table>
    </div>
    <div role="tabpanel" aria-labelledby="johnson_box" hidden>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Choose Jonson Box Image</th>                
                <td>                
                    <input type="hidden" name="jonson_box_img" id="spk_jonson_box_img" value="<?= esc_attr($options['jonson_box_img']) ?>" />
                    <img id="spk-author-img-preview">
                    <a href="#" class="button-primary" id="spk-img-btn">Select Image</a>                  
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Jonson Box Description</th>                
                <td>                
                    <textarea name="jonson_box_description" id="" cols="60" rows="2">
                        <?= $options['jonson_box_description']; ?>
                    </textarea>                        
                </td>
            </tr>
        </table>
    </div>
    <div role="tabpanel" aria-labelledby="typography" hidden>
        <p>Typography</p>
    </div>
    <div role="tabpanel" aria-labelledby="global_fields" hidden>
        <p>Global</p>
    </div>
    <div class="sumbit-btn">
        <?php submit_button(); ?>
    </div>                    
</form>