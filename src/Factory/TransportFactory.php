<?php

namespace Zf2EmailService\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Mail\Transport\Smtp;
use Zend\Mail\Transport\SmtpOptions;

/**
 * Description of TransportFactory
 *
 * @author alex
 */
class TransportFactory implements FactoryInterface
{
    /**
     * Creates service
     *
     * @param \Zend\ServiceManager\ServiceLocatorInterface $serviceLocator
     * @return \Zend\Mail\Transport\Smtp
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        $options = isset($config['smtp']) ? new SmtpOptions($config['smtp']) : array();

        return new Smtp($options);
    }
}
