<?php

/*!
* Developed by: Chris Q.
* Year: 2017
*
* Depends:
*   Wordpress
*/

// timestamp: 21th - 12 - 2016


if ( !is_user_logged_in() )
{
$errors = array();

$username = 'user'; // User
$password = 'pass'; // Pass
$remember = true; // Save pass, {true : false}
$remember = ($remember) ? "true" : "false";

$login_data = array();
$login_data['user_login'] = $username;
$login_data['user_password'] = $password;
$login_data['remember'] = $remember;
$user_verify = wp_signon($login_data, true);

if (is_wp_error($user_verify)) {
    $errors[] = 'Invalid username or password. Please try again!';
} else {
    wp_set_auth_cookie($user_verify->ID);
    wp_redirect(home_url()); // Redirect users
    exit;
}

}

?>
