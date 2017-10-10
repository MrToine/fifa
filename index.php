<?php
/*##################################################
 *                           index.php
 *                            -------------------
 *   begin                : 03-10-2017
 *   copyright            : (C) 2017 VIOLET Anthony
 *   email                : anthony.violet@outlook.be
 *
 *
 ###################################################
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 ###################################################*/

define('PATH_TO_ROOT', '..');
require_once PATH_TO_ROOT.'/kernel/init.php';

$url_controller_mappers = array(
	//Admin
	new UrlControllerMapper('AdminFifaHomeController', '`^/admin(?:/config)?/?$`'),

	//Home
	new UrlControllerMapper('FifaCreateMatchController', '`^/create/?`'),
	new UrlControllerMapper('FifaHomeController', '`^.*$`')
);
DispatchManager::dispatch($url_controller_mappers);