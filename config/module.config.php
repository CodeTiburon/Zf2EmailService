<?php

return array(
	'service_manager' => array(
        'factories' => array(
            'Zend\Mail\Transport\Smtp' => function($sm) {
                $config = $sm->get('Config');
                $options = isset($config['smtp']) ? new \Zend\Mail\Transport\SmtpOptions($config['smtp']) : array();

                return new \Zend\Mail\Transport\Smtp($options);
            }
        ),
    ),
);
