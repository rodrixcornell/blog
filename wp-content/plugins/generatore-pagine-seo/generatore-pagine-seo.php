<?php
/*
Plugin Name: Generatore pagine SEO
Plugin URI: http://www.avanguardia.info
Description: Genera pagine intorno alle keywords che si forniscono
Version: 1.0.0
Author: Ovidiu Purdea
Author URI: http://www.avanguardia.ro
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/


if(is_admin())
{
    global $table_prefix,$wpdb;
    add_action('admin_menu','auto_generate_plugin_admin_menu');

    function auto_generate_plugin_admin_menu() // Functions to be called in wp admin
    {

        add_options_page('Manage Contents','Generatore pagine SEO','administrator','content_settings','GPS_contents_settings_html_page');
    }
    
}



function GPS_contents_settings_html_page(){ //Function Generates HTML to be displayed when admin want to enter new cities
    
    global $table_prefix,$wpdb;
    
    if(isset($_REQUEST['action']))
    {
        $cityname_arr = explode("\n",$_REQUEST['cityname']);
        $title=$_REQUEST['page_title'];
        foreach($cityname_arr as $cityname){ //Cities Entered
            $cityname = str_replace(array("\n","\r","\r\n","\n\r")," ",$cityname);
            
            $title2= str_ireplace("[pb-city]",$cityname,$title);
            $page_contents = str_ireplace("[pb-city]",$cityname,str_replace(array("\n","\r","\r\n","\n\r")," ",$_REQUEST['page_contents']));
                $post_array=array( // post array with values to be provided to the wp_insert_post
              'post_content'   =>  $page_contents ,

              'post_status'    =>  'draft' ,
              'post_title'     => $title2,
              'post_type'      => 'page',
                'post_name'      => str_replace(" ","",str_replace(",","-",$cityname)) //post slug
            ); // Post Array End
            if(isset($_REQUEST['parent_page']) && $_REQUEST['parent_page']>=1)
                $post_array['post_parent']=$_REQUEST['parent_page'];
            

            $post = $post_array;
            $id = wp_insert_post($post);
            update_post_meta($id,'pb-city',$cityname);
            if(isset($_REQUEST['page_template']) && $_REQUEST['page_template']!='')
                update_post_meta($id, '_wp_page_template', $_REQUEST['page_template']);
            $update_message = '<div id="message" class="updated">
 <p>
   Pages Created. Click here to <a href="edit.php?post_status=draft&post_type=page">View Pages</a>
 </p>
</div>';

        }//End Foreach cityname_arr
    }//END IF 'Action'
    else{
                    $cityname='';
                    $imagename='';
                    $extra_contents='';
                    $update_message='';
	}//End Else

    ?>

	<div id="pb-city-form">
            <?php echo $update_message; ?>
		<h2><?php echo _e('Generatore Pagine SEO by Ovidiu');?></h2>
		<form method="post" action="" onsubmit="return validate_submit()">
		<?php wp_nonce_field('update-options'); ?>
		<table>
		<tr>
			<td valign="top"><?php echo _e('Parola chiave');?></td>
			<td>
				<textarea id="cityname" type="text" cols="40" rows="5" name="cityname" placeholder="Ex: parola1, parola2"></textarea>
                                <br><label><?php _e("una parola chiave per linea"); ?></label>
			</td>
		</tr>
		<tr>
			<td valign="top"><?php echo _e('Pagina Parente');?></td>
			<td><?php
                                  $pages = get_pages(); // Gets all pages type posts
                                  if($pages && !empty($pages)){
                                      echo "<select name='parent_page' id='parent_page' ><option value='0'>Nessuna</option>";
                                      foreach ( $pages as $page ) {
                                            $option = '<option value="' . $page->ID . '">';
                                            $option .= $page->post_title;
                                            $option .= '</option>';
                                            echo $option;
                                      }
                                      echo "</select>";
                                  }// End if Pages
                              ?>
                        </td>
		</tr>
		<tr>
		<td valign="top"><?php echo _e('Template di pagina');?></td><td>
		
		<?php
                                  $templates = get_page_templates(); //Get all available templates in the current themes
                                  if($templates && !empty($templates)){
                                      echo "<select name='page_template' id='page_template' ><option value=''>Default</option>";
                                      foreach ( $templates as $template_name => $template_filename ) {
                                            $option = '<option value="' . $template_filename  . '">';
                                            $option .= $template_name;
                                            $option .= '</option>';
                                            echo $option;
                                      }
                                      echo "</splect>";
                                  } //End IF Templates
                              ?>
		</td>
		</tr>
                <tr>
		<td valign="top"><?php echo _e('Titolo di pagina');?></td><td>
                    <input placeholder="<?php echo _e('ex: Compro oro a [pb-city]');?>" type="text" name="page_title" id="page_title" size="70">
		</td>
		</tr>
                <tr>
		<td valign="top" ><?php echo _e('Contenuto Pagina');?></td><td>
                    <textarea rows="15" cols="120"name="page_contents" id="page_contents"></textarea><br />
                    <?php echo _e('E possibile usare tag HTML e anche [pb-city] shortcode. Il shortcode si trasformera nella parola chiave. Una volta la pagina creata [pb-city] sarra cambiato con la parola chiave.'); ?>
		</td>
		</tr>
		</table>
		<input type="hidden" name="action" value="update" >
		<p>
		<input type="submit" value="<?php echo _e('CREA PAGINE'); ?>">
		</p>
		</form>
	</div>
<script language="javascript">
    function validate_submit() // Form values validation function
    {
        msg='';
        if(document.getElementById('upload_image').value == '')
        {
            msg = msg+"Please enter any image URL or upload an image\n";
        }
        if(document.getElementById('cityname').value == '')
        {
            msg = msg+"Please enter City Name for the image\n";
        }
        if(document.getElementById('extra_contents').value == '')
        {
            msg = msg+"Please enter some extra contents \n";
        }
        if(msg=='')
            {
                return true
            } //End If msg
            else
                {
                    alert(msg); // Message will be displayed to the user if there is any invalid values
                    return false;
                } //end else msg
    }// Validation FUnction Ends
    </script>
<?php
}// End Function GPS_contents_settings_html_page
?>
