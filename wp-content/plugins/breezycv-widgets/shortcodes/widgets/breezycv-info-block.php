<?php

namespace Breezycv\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Breezycv_Info_Block extends Widget_Base {

	public function get_name() {
		return 'breezycv-info-block';
	}

	public function get_title() {
		return __( 'Info Block', 'breezycv-widgets' );
	}

	public function get_icon() {
		return 'eicon-info-box';
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
					'value' => 'far fa-heart',
				],
			]
		);
		
		$this->add_control(
			'title',
			  [
				 'label'       => __( 'Title of the Info Block', 'breezycv-widgets' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type title here', 'breezycv-widgets' ),
				 'default' 	   => __( 'San Francisco', 'breezycv-widgets' ),
			  ]
		);

		$this->add_control(
			'text',
			  [
				 'label'       => __( 'Text of the Info Block', 'breezycv-widgets' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type text here', 'breezycv-widgets' ),
				 'default' 	   => '',
			  ]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings 	= $this->get_settings();

		$title 	= $settings['title'];
		$icon = $settings['icon']['value'];
		$text = $settings['text'];
		?>
		<div class="lm-info-block gray-default">
	        <i class="<?php echo esc_attr($icon); ?>"></i>
	        <h4><?php echo wp_kses_post($title); ?></h4>
	        <span class="lm-info-block-text"><?php echo wp_kses_post($text); ?></span>
	    </div>

	    <?php
	}

}
