<?php
/*##################################################
 *                           Player.class.php
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

class Player{
	private $_user_id,
			$_favorite_club,
			$_goals,
			$_conceded,
			$_win,
			$_lose,
			$_draw,
			$_points;


	public function get_user_id(){
		return $this->_user_id;
	}

	public function get_favorite_club(){
		return $this->_favorite_club;
	}

	public function get_goals(){
		return $this->_goals;
	}

	public function get_conceded(){
		return $this->_conceded;
	}

	public function get_win(){
		return $this->_win;
	}

	public function get_lose(){
		return $this->_lose;
	}

	public function get_draw(){
		return $this->_draw;
	}
	
	public function get_points(){
		return $this->_points;
	}

	public function set_user_id($user_id){
		$user_id = (int)$user_id;
		if(is_int($user_id)){
			$this->_user_id = htmlspecialchars($user_id);
		}
	}

	public function set_favorite_club($favorite_club){
		if(is_string($favorite_club)){
			$this->_favorite_club = htmlspecialchars($favorite_club);
		}
	}

	public function set_goals($goals){
		$goals = (int)$goals;
		if(is_int($goals)){
			$this->_goals = htmlspecialchars($goals);
		}
	}

	public function set_conceded($conceded){
		$conceded = (int)$conceded;
		if(is_int($conceded)){
			$this->_conceded = htmlspecialchars($conceded);
		}
	}

	public function set_win($win){
		$win = (int)$win;
		if(is_int($win)){
			$this->_win = htmlspecialchars($win);
		}
	}

	public function set_lose($lose){
		$lose = (int)$lose;
		if(is_int($lose)){
			$this->_lose = htmlspecialchars($lose);
		}
	}

	public function set_draw($draw){
		$draw = (int)$draw;
		if(is_int($draw)){
			$this->_draw = htmlspecialchars($draw);
		}
	}

	public function set_points($points){
		$points = (int)$points;
		if(is_int($points)){
			$this->_points = htmlspecialchars($points);
		}
	}

	public function get_properties(){
		return array(
			'user_id' => $this->get_id(),
			'favorite_club' => TextHelper::htmlspecialchars($this->get_favorite_club()),
			'win' => TextHelper::htmlspecialchars($this->get_win()),
			'lose' => TextHelper::htmlspecialchars($this->get_losen()),
			'draw' => TextHelper::htmlspecialchars($this->get_draw()),
			'goals' => TextHelper::htmlspecialchars($this->get_goals()),
			'conceded' => (int) $this->get_conceded(),
			'points' => (int) $this->get_points()
		);
	}
	
	public function set_properties(array $properties){
		$this->_user_id = $properties['user_id'];
		$this->_favorite_club = $properties['favorite_club'];
		$this->_win = $properties['win'];
		$this->_lose = $properties['lose'];
		$this->_draw = $properties['draw'];
		$this->_goals = $properties['goals'];
		$this->_conceded = $properties['conceded'];
		$this->_points = $properties['points'];
		
	}

	public function get_array_tpl_vars(){
		return array(
			'USER_ID' => $this->_user_id,
			'FAVORITE_CLUB' => $this->_favorite_club,
			'WINS' => $this->_win,
			'LOSES' => $this->_lose,
			'DRAWS' => $this->_draw,
			'NB_GOALS' => $this->_goals,
			'NB_CONCEDED' => $this->_conceded,
			'POINTS' => $this->_points,
		);
	}
}