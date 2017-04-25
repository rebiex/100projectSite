<?php
/*
Title: Portfolio Details
Post Type: portfolio
*/

piklist('field', array(
    'type' => 'group'
    ,'label' => __('Sections')
    ,'columns' => 12
    ,'add_more' => true
    ,'field' => 'section'
    ,'fields' => array(
        array(
			'label' => 'Title',
            'type' => 'text'
            ,'field' => 'title'
            ,'columns' => 12
        ),
        array(
			'label' => 'Subtitle',
            'type' => 'text'
            ,'field' => 'subtitle'
            ,'columns' => 12
        ),
		array(
			'label' => 'Things',
            'type' => 'text'
            ,'field' => 'methods'
            ,'columns' => 12
        ),
		array(
			'label' => 'Content',
            'type' => 'textarea'
            ,'field' => 'content'
            ,'columns' => 12
        ),
		array(
			'label' => 'Background color',
            'type' => 'colorpicker'
            ,'field' => 'background'
            ,'columns' => 12
        ),
		array(
			'label' => 'Image',
            'type' => 'file'
            ,'field' => 'image'
            ,'columns' => 12
        ),
		array(
			'label' => 'Video URL',
            'type' => 'text'
            ,'field' => 'video_url'
            ,'columns' => 12
        ),
		array(
			'label' => 'Order',
            'type' => 'text',
			'help' => 'Write a number, sections are going to be orderer by this number in ascending order'
            ,'field' => 'order'
            ,'columns' => 12
        ),
		array(
			'label' => 'Layout',
            'type' => 'select'
            ,'field' => 'layout'
            ,'columns' => 12,
			'choices' => array(
		      1 => 'Left to Right',
		      2 => 'Right to Left'
		    )
        )
    )
));
