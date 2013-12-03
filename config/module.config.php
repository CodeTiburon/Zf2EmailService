<?php

return array(
	'service_manager' => array(
	    'invokables'   => array(
            'Zf2EmailService\Email' => 'Zf2EmailService\Service\Email',
        ),
        'factories' => array(
            'Zend\Mail\Transport\Smtp' => function($sm) {
                $config = $sm->get('Config');
                $options = isset($config['smtp']) ? new \Zend\Mail\Transport\SmtpOptions($config['smtp']) : array();

                return new \Zend\Mail\Transport\Smtp($options);
            }
        ),
    ),
);
