<?php
/*##################################################
 *                           FifaCreateMatchController.class.php
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

class FifaCreateMatchController extends ModuleController{

	private $view;
	private $lang;

	public function execute(HTTPRequestCustom $request){

		$this->init();

		$form = $this->build_form();

		$this->view->put('form', $form->display());

		return $this->generate_response();
	}

	private function build_form(){

		$form = new HTMLForm('PartnersForm');

		// FIELDSET
		$fieldset = new FormFieldsetHTML('fieldset', 'Joueur 1');
		$form->add_fieldset($fieldset);

		$fieldset->add_field(new FormFieldSimpleSelectChoice('player1', $this->lang['create.playername'], '',
			array(
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1')
				)),
			array('required' => true)
		);
		$fieldset->add_field(new FormFieldSimpleSelectChoice('playerclub1', $this->lang['create.playerclub'], '',
			array(
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1')
				)),
			array('required' => true)
		);
		$fieldset->add_field(new FormFieldSimpleSelectChoice('playergoals1', $this->lang['create.nb_goals'], '',
			array(
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1')
				)),
			array('required' => true)
		);

		// Player 2
		$fieldset = new FormFieldsetHTML('fieldset', 'Joueur 2');
		$form->add_fieldset($fieldset);
		
		$fieldset->add_field(new FormFieldSimpleSelectChoice('player2', $this->lang['create.playername'], '',
			array(
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1')
				)),
			array('required' => true)
		);
		$fieldset->add_field(new FormFieldSimpleSelectChoice('playerclub2', $this->lang['create.playerclub'], '',
			array(
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1')
				)),
			array('required' => true)
		);
		$fieldset->add_field(new FormFieldSimpleSelectChoice('playergoals2', $this->lang['create.nb_goals'], '',
			array(
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1'),
				new FormFieldSelectChoiceOption('1', '1')
				)),
			array('required' => true)
		);

		// BUTTONS
		$buttons_fieldset = new FormFieldsetSubmit('buttons');
		$this->submit_button = new FormButtonDefaultSubmit();
		$buttons_fieldset->add_element($this->submit_button);
		$form->add_fieldset($buttons_fieldset);
		
		return $form;
	}

	private function init(){

		$this->lang = LangLoader::get('common', 'fifa');
		$this->view  = new FileTemplate('fifa/FifaCreateMatchController.tpl');
		$this->view->add_lang($this->lang);
	}

	private function generate_response(){

		$response = new SiteDisplayResponse($this->view);
		$graphical_environment = $response->get_graphical_environment();
		$graphical_environment->set_page_title($this->lang['fifa.create_match']);

		return $response;
	}
}