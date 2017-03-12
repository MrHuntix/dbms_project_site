function showbox () {
	a = document.getElementById('box')
	if($('#box').css('visibility') == 'hidden')
	{
		a.style.visibility='visible'
	}
	else
	{
		a.style.visibility='hidden'
	}
}