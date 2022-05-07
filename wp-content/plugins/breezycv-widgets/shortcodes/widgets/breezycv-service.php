<?php

namespace Breezycv\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Breezycv_Service extends Widget_Base {

	public function get_name() {
		return 'breezycv-service';
	}

	public function get_title() {
		return __( 'Service', 'breezycv-widgets' );
	}

	public function get_icon() {
		return 'eicon-icon-box';
	}

	public function get_categories() {
		return [ 'breezycv-elements' ];
	}

	protected function _register_controls() {
		
		$this->start_controls_section(
			'section1',
			[
				'label' => __( 'Content', 'breezycv-widgets' ),
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'breezycv-widgets' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-desktop',
					'fa4compatibility' => true
				],
			]
		);
		
		$this->add_control(
			'title',
			  [
				 'label'       => __( 'Title of the Service', 'breezycv-widgets' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type title here', 'breezycv-widgets' ),
				 'default' 	   => __( 'Service', 'breezycv-widgets' ),
			  ]
		);
		
		$this->add_control(
			'description',
			  [
				 'label'       => __( 'Description', 'breezycv-widgets' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type description here', 'breezycv-widgets' ),
				 'default' 	   => '',
			  ]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		$settings 	= $this->get_settings();

		$title 			= $settings['title'];
		$desc 			= $settings['description'];
		$icon 		    = $settings['icon']['value'];

		$html = do_shortcode('[breezycv_service title="'.$title.'" desc="'.$desc.'" icon="'.$icon.'"]');
		echo $html;
	}

}
