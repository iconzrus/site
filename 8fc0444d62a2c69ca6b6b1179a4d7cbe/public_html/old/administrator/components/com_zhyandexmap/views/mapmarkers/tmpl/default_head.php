<?php
/*------------------------------------------------------------------------
# com_zhyandexmap - Zh YandexMap
# ------------------------------------------------------------------------
# author    Dmitry Zhuk
# copyright Copyright (C) 2011 zhuk.cc. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
# Websites: http://zhuk.cc
# Technical Support Forum: http://forum.zhuk.cc/
-------------------------------------------------------------------------*/
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<tr>
	<th width="10">
		<?php echo JText::_('COM_ZHYANDEXMAP_MAPMARKER_HEADING_ID'); ?>
	</th>
	<th width="20">
		<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
	</th>			
	<th>
		<?php echo JText::_('COM_ZHYANDEXMAP_MAPMARKER_HEADING_TITLE'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_ZHYANDEXMAP_MAPMARKER_HEADING_MAPTITLE'); ?>
	</th>
	<th width="5">
		<?php echo JText::_('COM_ZHYANDEXMAP_MAPMARKER_HEADING_ICONTYPE'); ?>
	</th>
	<th width="5">
		<?php echo JText::_('COM_ZHYANDEXMAP_MAPMARKER_HEADING_PUBLISHED'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_ZHYANDEXMAP_MAPMARKER_HEADING_MARKERGROUP'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_ZHYANDEXMAP_MAPMARKER_HEADING_CATEGORY'); ?>
	</th>
	<th width="10%" class="nowrap hidden-phone">
		<?php echo JText::_('JGRID_HEADING_ACCESS'); ?>
	</th>	
	<th>
		<?php echo JText::_('COM_ZHYANDEXMAP_MAPMARKER_HEADING_USER'); ?>
	</th>
</tr>


