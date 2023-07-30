<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_articles_popular
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?>
<ul class="mostread">
<?php foreach ($list as $item) : ?>
	<li class="mostread">
		<a href="<?php echo $item->link; ?>" class="mostread"><?php echo $item->title; ?></a>
	</li>
<?php endforeach; ?>
</ul>