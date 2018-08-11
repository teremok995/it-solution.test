{extends '_base.tpl'}


{block 'content'}
	<div class="Error404 text-center">
		<h3>К сожалению данное сокрощение не найдено!</h3>
		<br>
		<a href="/">Вернуться на главную</a>
		<br>
		{$content}
	</div>
{/block}