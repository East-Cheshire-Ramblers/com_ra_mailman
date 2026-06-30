<?php

/**
 * @package    com_ra_mailman
 * @copyright  Copyright (C) East Cheshire Ramblers. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Ramblers\Component\Ra_mailman\Api\View\Profiles;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\JsonApiView as BaseApiView;

class JsonapiView extends BaseApiView
{
	protected $fieldsToRenderItem = [
		'id',
		'member_id',
		'user_id',
		'preferred_name',
		'full_name',
		'email',
		'home_group',
		'groupName',
		'groupCode',
		'memberStatus',
		'volunteer',
	];

	protected $fieldsToRenderList = [
		'id',
		'member_id',
		'user_id',
		'preferred_name',
		'full_name',
		'email',
		'home_group',
		'groupName',
		'groupCode',
		'memberStatus',
		'volunteer',
	];
}
