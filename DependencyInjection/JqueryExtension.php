<?php

namespace Schokri\JqueryBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class JqueryExtension extends Extension {

    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container) {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $this->setConnection($config, $container);
        $this->setAutocompleteApi($config, $container);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
    }
    /**
     * 
     * @param type $config
     * @param ContainerBuilder $container
     */
    private function setConnection($config, ContainerBuilder $container){
        if(!isset($config['connection'])){
            throw new InvalidConfigurationException('You must define connection');
        }
    }
    /**
     * 
     * @param type $config
     * @param ContainerBuilder $container
     */
    private function setAutocompleteApi($config, ContainerBuilder $container) {
        if ($config['jquery_autocomplete']) {
            if (is_array($config['jquery_autocomplete']) && count($config['jquery_autocomplete'])) {
                foreach ($config['jquery_autocomplete'] as $key => $value) {
                    if (!isset($value['entity'])) {
                        throw new InvalidConfigurationException(sprintf('jquery autocomplete: %s must have entity class !!', $key));
                    }
                    if (is_array($value)) {
                        if (!isset($value['entity'])) {
                            throw new InvalidConfigurationException(sprintf('%s Autocomplete must have entity class !!', $key));
                        }
                        $container->setParameter('sc_jquery_autocomplete.' . $key, array(
                            'entity' => $value['entity'],
                        ));
                    }
                }
            }
        }
    }

}
