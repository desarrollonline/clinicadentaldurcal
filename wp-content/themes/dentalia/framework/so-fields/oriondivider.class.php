<?php

/**
 * Class oriondivider field
 */
class SiteOrigin_Widget_Field_oriondivider extends SiteOrigin_Widget_Field_Base {
	/**
	 * My custom property for doing custom things.
	 *
	 * @access protected
	 * @var mixed
	 */
	protected $my_property;
	protected function render_field( $value, $instance ) {
		?>
		<hr>
		<?php
	}
	protected function sanitize_field_input($value, $instance) {
		return '';
	}
	protected function add_label_classes( $label_classes ) {
		$label_classes[] = 'orion-form-divider';
		return $label_classes;
	}
	protected function render_field_label($value, $instance) {
	}
	protected function render_before_field( $value, $instance ) {
		// This is to keep the default label rendering behaviour.
		parent::render_before_field( $value, $instance );
		// Add custom rendering here.
		$this->render_field_description();
	}
	protected function render_after_field( $value, $instance ) {
		// Leave this blank so that the description is not rendered twice
	}
}
?>