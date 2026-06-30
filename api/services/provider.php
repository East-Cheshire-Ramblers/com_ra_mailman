<?php

/**
 * @package    com_ra_mailman
 * @copyright  Copyright (C) East Cheshire Ramblers. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Dispatcher\ComponentDispatcherFactoryInterface;
use Joomla\CMS\Extension\ComponentInterface;
use Joomla\CMS\Extension\Service\Provider\ComponentDispatcherFactory;
use Joomla\CMS\Extension\Service\Provider\MVCFactory;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Ramblers\Component\Ra_mailman\Api\Extension\Ra_mailmanComponent;

return new class implements ServiceProviderInterface
{
	public function register(Container $container)
	{
		$container->registerServiceProvider(new MVCFactory('\\Ramblers\\Component\\Ra_mailman\\Api'));
		$container->registerServiceProvider(new ComponentDispatcherFactory('\\Ramblers\\Component\\Ra_mailman\\Api'));

		$container->set(
			ComponentInterface::class,
			function (Container $container)
			{
				$component = new Ra_mailmanComponent(
					$container->get(ComponentDispatcherFactoryInterface::class)
				);
				$component->setMVCFactory($container->get(MVCFactoryInterface::class));

				return $component;
			}
		);
	}
};
