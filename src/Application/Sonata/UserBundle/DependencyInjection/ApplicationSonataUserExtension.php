<?php
/**
 * This file is part of the <orientation> project.
 *
 * (c) <Kreactive>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * File name:  UserExtension.php
 * PHP version 5
 *
 * @category Product
 * @package  Application\Sonata\UserBundle\DependencyInjection
 * @author   Hao TAN <h.tan@kreactive.com>
 * @link     http://www.orientation.com
 */

namespace Application\Sonata\UserBundle\DependencyInjection;


use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class ApplicationSonataUserExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
//        $configuration = new Configuration();
//        $config = $this->processConfiguration($configuration, $configs);

//        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
//        $loader->load('services.yml');
    }
}