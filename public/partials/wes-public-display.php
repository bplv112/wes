<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       bplv.com.np
 * @since      1.0.0
 *
 * @package    Wes
 * @subpackage Wes/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->


<?php
$default = wes_default_option();
$enabled =  NULL!= wes_option('wes_enable_social')  ? wes_option('wes_enable_social') : $default['wes_enable_social'];
$order = NULL!= wes_option('wes_social_order') ? wes_option('wes_social_order') : $default['wes_social_order'];
$perm = get_permalink($post_id);
$title = get_the_title($post_id);
$excerpt = get_the_excerpt($post_id);
$url = wes_url_helper($perm,$title,$excerpt); 
$new_tab = wes_option('wes_new_tab') == 1 ? 'target = _blank' : '';
?>
<div id="social-platforms">
<?php if( NULL!= wes_option('wes_social_title') ): ?>
<h3><?php echo esc_html(wes_option('wes_social_title')); ?></h3>
<?php endif; ?>
	<ul class="wes-social-icons">
		<?php if (!empty($order) ){ ?>
			<?php foreach ($order as $key => $value) { ?>
				<?php if(array_key_exists($value, $enabled)){ ?>
					<li class="wes-icon-list">
						<a class="btn btn-icon btn-<?php echo esc_attr(($value)); ?>" href="<?php echo esc_html($url[$value]);?>" <?php echo $new_tab; ?> ><i class="fa fa-<?php echo esc_attr($value); ?>"></i></a>
					</li>
				<?php
				}
			}
		}
		?>
	</ul>

</div>
