<?php
/*##################################################
 *                           AdminFifaHomeController.class.php
 *                            -------------------
 *   begin                : 04-10-2017
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
class AdminFifaHomeController extends AdminModuleController{	
	private $lang,
			$view,
			$config,
			$admin_common_lang;

	public function execute(HTTPRequestCustom, $request){
		$this->init();

		$this->build_view();

		return new AdminFifaDisplayResponse($this->view, $this->lang['fifa.admin_home']);
	}

	private function init(){
		$this->config = FifaConfig::load();
		$this->lang = LangLoader::get('common', 'fifa');
		$this->admin_common_lang = LangLoader::get('admin-common');
		$this->view = new FileTemplate('fifa/AdminHomeController.tpl');
		$this->view->add_lang($this->lang);
	}

	private function build_view(){

	}
}