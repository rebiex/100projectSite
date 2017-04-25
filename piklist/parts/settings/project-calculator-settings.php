<?php
/*
Title: Project Calculator
Setting: my_theme_settings
*/

piklist('field', array(
    'type' => 'group'
    ,'label' => __('Sections')
    ,'columns' => 12
    ,'add_more' => true
    ,'field' => 'modules'
    ,'fields' => array(
		array(
			'label' => 'Module Name',
            'type' => 'text'
            ,'field' => 'name'
            ,'columns' => 12
        ),
		array(
			'label' => 'Duration',
            'type' => 'text'
            ,'field' => 'duration'
            ,'columns' => 12
        ),
    )
));
