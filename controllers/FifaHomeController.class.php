<?php
/*##################################################
 *                           HomeFifaController.class.php
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

class FifaHomeController extends ModuleController{

	private $view;
	private $lang;

	public function execute(HTTPRequestCustom $request){

		$this->init();

		$this->build_view();

		return $this->generate_response();
	}

	private function build_view(){

		$result = PersistenceContext::get_querier()->select('SELECT * FROM '.FifaSetup::$fifa_player_table.'players JOIN '.DB_TABLE_MEMBER.' ON '.DB_TABLE_MEMBER.'.user_id = '.FifaSetup::$fifa_player_table.'players.user_id');

		while ($row = $result->fetch())
		{
			$player = new Player();
			$player->set_properties($row);
			
			$played_match = $player->get_win() + $player->get_lose() + $player->get_draw();

			$difference = $player->get_goals() - $player->get_conceded();

			if($difference < 0){
				$difference = "-".$difference;
			}

			$this->view->assign_block_vars('player', $player->get_array_tpl_vars(),array(
				'USERNAME' => $row['display_name'],
				'PLAYED' => $played_match,
				'DIFFERENCE' => $difference
			));
		}
		
		$result->dispose();
	}

	private function init(){

		$this->lang = LangLoader::get('common', 'fifa');
		$this->view  = new FileTemplate('fifa/home.tpl');
		$this->view->add_lang($this->lang);
	}

	private function generate_response(){

		$response = new SiteDisplayResponse($this->view);
		$graphical_environment = $response->get_graphical_environment();
		$graphical_environment->set_page_title($this->lang['module.title']);

		return $response;
	}
}