<?php

/**
 * @package    com_ra_mailman
 * @copyright  Copyright (C) East Cheshire Ramblers. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Ramblers\Plugin\WebServices\Ra_mailman\Extension;

defined('_JEXEC') or die;

use Joomla\CMS\Event\Application\BeforeApiRouteEvent;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\Event\SubscriberInterface;
use Joomla\Router\Route;

class Ra_mailman extends CMSPlugin implements SubscriberInterface
{
	public static function getSubscribedEvents(): array
	{
		return [
			'onBeforeApiRoute' => 'onBeforeApiRoute',
		];
	}

	public function onBeforeApiRoute(BeforeApiRouteEvent $event): void
	{
		$event->getRouter()->addRoutes(
			[
				new Route(
					['GET'],
					'v1/ra_mailman/profiles',
					'profiles.displayList',
					[],
					['component' => 'com_ra_mailman']
				),
			]
		);
	}
}
