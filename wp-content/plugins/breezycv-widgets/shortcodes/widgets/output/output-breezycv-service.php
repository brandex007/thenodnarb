<?php

class BreezycvService {

	public static $args;

	public function __construct() {
		
		add_shortcode( 'breezycv_service', array( $this, 'render' ) );

	}

	function render( $args, $content = '') {

		$defaults = shortcode_atts( array (
			 'title'  			=> '',
			 'desc'  			=> '',
			 'icon'  		    => '',
		), $args );
		
		extract( $defaults );

		self::$args = $defaults;
		
		$html = '<div class="info-list-w-icon">
			<div class="info-block-w-icon">
				<div class="ci-icon">
					<i class="'.$icon.'"></i>
				</div>
				<div class="ci-text">
					<h4>'.$title.'</h4>
					<p>'.$desc.'</p>
				</div>
			</div>
		</div>';
		
		return $html;

	}

}

new breezycvService();