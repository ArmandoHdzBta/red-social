var btnabrirpopup = document.getElementById('btn-abrir-box'),
	box = document.getElementById('box'),
	btncerrarpopup = document.getElementById('btn-cerrar-box');

btnabrirpopup.addEventListener('click', function(){
	box.addClass('active');
});

btncerrarpopup.addEventListener('click', function(){
	box.classList.remove('active');
});