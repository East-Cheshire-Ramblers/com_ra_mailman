<?php

/**
 * @package    com_ra_mailman
 * @copyright  Copyright (C) East Cheshire Ramblers. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Extension\PluginInterface;
use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Event\DispatcherInterface;
use Ramblers\Plugin\WebServices\Ra_mailman\Extension\Ra_mailman;

return new class () implements ServiceProviderInterface
{
	public function register(Container $container): void
	{
		$container->set(
			PluginInterface::class,
			function (Container $container)
			{
				$plugin = new Ra_mailman(
					$container->get(DispatcherInterface::class),
					(array) PluginHelper::getPlugin('webservices', 'ra_mailman')
				);
				$plugin->setApplication(Factory::getApplication());

				return $plugin;
			}
		);
	}
};
