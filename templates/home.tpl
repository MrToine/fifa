<section id="module-fifa">
	<header><h1>{@module.title}</h1></header>
	<div class="content">{@welcome.message}</div>
</section>

# IF IS_USER_CONNECTED #
<a href="{@btn.create_match}" class="basic-button">{@fifa.create_match}</a>
# ENDIF #
<table>
	<tr>
		<th>{@th.players}</th>
		<th>{@th.favorite_clubs}</th>
		<th>{@th.played}</th>
		<th>{@th.victories}</th>
		<th>{@th.loses}</th>
		<th>{@th.draw}</th>
		<th>{@th.nb_goals}</th>
		<th>{@th.nb_conceded}</th>
		<th>{@th.difference}</th>
		<th>{@th.points}</th>
	</tr>
	# START player #
		<tr>
			<td>{player.USERNAME}</td>
			<td>{player.FAVORITE_CLUB}</td>
			<td>{player.PLAYED}</td>
			<td>{player.WINS}</td>
			<td>{player.LOSES}</td>
			<td>{player.DRAWS}</td>
			<td>{player.NB_GOALS}</td>
			<td>{player.NB_CONCEDED}</td>
			<td>{player.DIFFERENCE}</td>
			<td>{player.POINTS}</td>
		</tr>
	# END PLAYER #
</table>