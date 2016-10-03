<?php
/*
Plugin Name: code387 contact
Description: non opiniated contact form for code387
Version: 1.0
Author: Benjamin Babic
Author URI: http://www.kekebeen.github.io
*/
    //
    // the plugin code will go here..
    //

function form_html(){
    echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
    echo '<div class="fl w-100 w-50-l pr2-l">';
    echo '<label for="emailInput">Your email</label>';
    echo '<input type="email" placeholder="example@mailbox.com"
                 value="' . ( isset( $_POST["form-email"] ) ? esc_attr( $_POST["form-email"] ) : '' ) . '"
                 name="form-email" id="emailInput"
                 class="dib w-100 border-box br1 ba pv2 ph3 mt2 br2" required>';
    echo '</div>';
    echo '<div class="fl w-100 w-50-l pl2-l mt3 mt0-l">';
    echo '<label for="subjectInput">Your subject</label>';
    echo '<input type="text" pattern="[a-zA-Z ]+"
                 name="form-subject" placeholder="subject"
                 value="' . (isset($POST["form-subject"]) ? esc_attr( $_POST["form-subject"]) : '' ) . '"
                 id="subjectInput" class="dib w-100 border-box br1 ba pv2 ph3 mt2 br2" required>';
    echo '</div>';
    echo '<div class="fl w-100 mv4">';
    echo '<label for="emailBody">Message</label>';
    echo '<textarea class="dib w-100 border-box br1 ba pv2 ph1 mt2 br2"
                    name="form-textarea" placeholder="Hi code387..."
                    value="' . ( isset($_POST["form-textarea"]) ? esc_attr($_POST["form-textarea"]) : '' ) .'"
                    id="emailBody" required></textarea>';
    echo '</div>';
    echo '<input type="submit" value="submit" name="form-submit" class="btn dim bg-blue white pv2 ph4 ttu">';
    echo '</form><!-- main form -->';
}

function parse_form(){
    //on submit check if input errors
    if(isset($_POST["form-submit"]) ){
        //wp sanitaze all inputs
        $email      = sanitize_email( $_POST["form-email"] );
        $subject    = sanitize_text_field( $_POST["form-subject"] );
        $message    = esc_textarea( $_POST["form-textarea"] );
        $to         = get_option('admin_email');
        $headers    = "From: website form <$email>" . "\r\n";

        //try to send.If ok display success message
        if (wp_mail( $to, $subject, $message, $headers) ){
            echo '<div>';
            echo '<p>Thanks for contacting us, expect a response soon.</p>';
            echo '</div>';
        }//if wp_maile
        else{
            echo '<div class="red">An Unexpected error occured</div>';
        }//wp_mail
    }
}

function code387_form_shortcode(){
    ob_start();
    parse_form();
    form_html();
    return ob_get_clean();
}
//add contact form
add_shortcode( 'code387_contact', 'code387_form_shortcode' );
?>
