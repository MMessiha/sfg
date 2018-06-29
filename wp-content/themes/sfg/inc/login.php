<?php
add_action( 'login_init', 'sfg_login' );
/**
 * Custom login logo
 */

function sfg_login() { ?>

<style type="text/css"> 
	body.login {
		background: #0B0152 !important;
	}

	body #login {
		width: 539px;
	}

	body.login a {
		color: #f7941d;
	}

	body.login div#login h1 a {
		background-image: url( <?php the_field( 'header_logo', 'option' ); ?> );
		height: 141px;
		width: 539px;
		background-size: 539px;

	}

	body.login.wp-core-ui .button.button-large {
		width: 100%;
		background: #FBC657;
		border-radius: 0;
		margin-top: 15px;
	    font-family: 'Open sans', sans-serif;
	    font-size: 16px;
	    text-transform: uppercase;
	    box-shadow: 0 0 0;
	    text-shadow: 0 0 0;
	    border: 1px solid #ffffff;
	    height: 41px;
	}

	body.login #backtoblog, .login #nav {
		display: none;
	}

	body.login form {
		background: #055597;
		padding: 30px;
	}

	body.login label {
	    font-size: 16px;
   		font-family: 'Montserrat', sans-serif;
	    text-transform: uppercase;
	    color: #ffffff;
	}

	body.login #login_error, body.login .message {
		border-left: 4px solid #FBC657;
		background: #055597;
   		font-family: 'Montserrat', sans-serif;
	    font-size: 14px;
	    color: #ffffff;
	}

	body.login form .forgetmenot label {
		text-transform: unset;
	}
</style>

<?php }
