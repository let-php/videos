let sideMenu = document.querySelector('#LetSideMenu');
let btnMenu = document.querySelector('#LetBtnMenu');

$LetPHP.videos = {
	onShowMenu : () => {
		
		let sStateMenu = sideMenu.getAttribute('data-menu-side');
		
		if(sStateMenu == 'hide')
		{
			
			onShowAndHideMenu('show', 'hide-menu', 'show-menu');
			
			/*sideMenu.classList.add('show-menu');
			sideMenu.classList.add('show-menu');
			sideMenu.setAttribute('data-menu-side', 'show');*/
		}
		else if( sStateMenu == 'show')
		{
			
			onShowAndHideMenu('hide', 'show-menu', 'hide-menu');
		}
		
		
	}
	
};


const onShowAndHideMenu = (data, hide, show) => {
	sideMenu.setAttribute('data-menu-side', data);
	sideMenu.classList.remove(hide);
	sideMenu.classList.add(show);
};



