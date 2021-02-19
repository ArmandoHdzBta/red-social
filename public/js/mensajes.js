$(document).ready(function() {
	var de = $("#de").val(),
		para = $("#para").val();
	$.post('index.php?controller=Chat&action=todo', {de: de, para: para}, function(data, textStatus) {
		datos = JSON.parse(data);
		for (dato of datos){
			$(".mensajes").append('<div class="mensaje2">'+
									'<p>'+dato.mensaje+'</p>'+
									'<button onclick="borrar('+dato.idmensajes+')">Eliminar</button>'+
								'</div>');
		}
	});
});
function borrar(idmensaje) {
	$.post('index.php?controller=Chat&action=borrar', {idmensaje: idmensaje}, function(data, textStatus) {
		alert("Mensaje borrado");
	});
}