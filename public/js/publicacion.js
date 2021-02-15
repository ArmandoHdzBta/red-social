$(document).ready(function() {
	$.post('index.php?controller=Publicacion&action=verPost', function(data, status) {
		datos = JSON.parse(data);
		console.log(datos);
	});
});