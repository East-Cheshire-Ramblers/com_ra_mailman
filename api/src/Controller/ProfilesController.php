<?php

/**
 * @package    com_ra_mailman
 * @copyright  Copyright (C) East Cheshire Ramblers. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Ramblers\Component\Ra_mailman\Api\Controller;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\ApiController;

class ProfilesController extends ApiController
{
	protected $contentType = 'profiles';

	protected $default_view = 'profiles';
}
