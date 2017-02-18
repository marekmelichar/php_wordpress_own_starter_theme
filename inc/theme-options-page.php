<?php

/**
 * Theme Options Page
 */
add_action( 'admin_menu', 'muzli_add_admin_menu' );
add_action( 'admin_init', 'muzli_settings_init' );

function muzli_add_admin_menu()
{
	add_options_page( 'Theme Settings', 'Theme Settings', 'manage_options', 'theme_settings',
		'muzli_options_page' );
}

function muzli_settings_init()
{
	register_setting( 'muzli_theme', 'muzli_settings', 'save_muzli_theme_settings' );

	add_settings_section(
		'muzli_copyright_section',
		__( 'Copyright Info', 'muzli' ),
		false,
		'muzli_theme'
	);

	add_settings_field(
		'copyright_by',
		__( 'Copyright by', 'muzli' ),
		'copyright_by_render',
		'muzli_theme',
		'muzli_copyright_section'
	);

	add_settings_field(
		'copyright_text',
		__( 'Footer text', 'muzli' ),
		'copyright_text_render',
		'muzli_theme',
		'muzli_copyright_section'
	);

	add_settings_section(
		'muzli_logo_section',
		__( 'Upload a Logo', 'muzli' ),
		false,
		'muzli_theme'
	);

	add_settings_field(
		'logo',
		__( 'Choose an Image', 'muzli' ),
		'muzli_logo_render',
		'muzli_theme',
		'muzli_logo_section'
	);
}

// sanitize data and upload logo
function save_muzli_theme_settings( $data )
{
	$data = array_map('sanitize_text_field', $data);
	$options = extend_array( get_option( 'muzli_settings' ), $data );

	// upload logo
	if ( !empty( $_FILES['logo']['tmp_name'] ) && file_is_displayable_image( $_FILES['logo']['tmp_name'] ) )
	{
		$upload = wp_handle_upload( $_FILES['logo'], array('test_form' => false) );
		$options['logo'] = $upload['url'];
	}

	return $options;
}

// copyright by field
function copyright_by_render()
{
	$options = get_option( 'muzli_settings' );
	$value = isset($options['copyright_by']) ? $options['copyright_by'] : '';
	?>
	<input type="text" name="muzli_settings[copyright_by]" value="<?php echo $value ?>" class="regular-text">
	<?php
}

// copyright text field
function copyright_text_render()
{
	$options = get_option( 'muzli_settings' );
	$value = isset($options['copyright_text']) ? $options['copyright_text'] : '';
	?>
	<textarea cols="46" rows="3" name="muzli_settings[copyright_text]"><?php echo $value ?></textarea>
	<?php
}

// upload logo
function muzli_logo_render()
{
	$options = get_option( 'muzli_settings' );
	$logo = isset($options['logo']) ? $options['logo'] : ''; ?>

	<p><input type="file" name="logo"></p>

	<?php if ( $logo ) : ?>

	<p><img src="<?php echo esc_url( $logo ) ?>" alt="muzli-logo" class="muzli-logo"></p>

<?php endif;
}

// theme options form
function muzli_options_page()
{
	?>
	<div class="wrap">
		<h1>Theme Settings</h1>
		<form action="options.php" method="post" enctype="multipart/form-data">
			<?php
			settings_fields( 'muzli_theme' );
			do_settings_sections( 'muzli_theme' );
			submit_button();
			?>
		</form>
	</div>

	<style>
		.muzli-logo {
			padding: 10px;
			margin: 10px 0;
			background: #fff;
			border: 1px solid #ddd;
			border-radius: 6px;
		}
	</style>
	<?php
}