<?php

return array(
	'service_manager' => array(
	    'invokables'   => array(
            'Zf2EmailService\Email' => 'Zf2EmailService\Service\Email',
        ),
        'factories' => array(
            'Zend\Mail\Transport\Smtp' => 'Zf2EmailService\Factory\TransportFactory'
        ),
    ),
);
