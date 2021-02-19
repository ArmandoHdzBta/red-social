$(document).ready(function() {
	var idusuario = $("#idusuario").val();
	$.ajax({
		url: 'index.php?controller=Usuario&action=informacion',
		type: 'POST',
		data: {idusuario: idusuario}
	})
	.done(function(r) {
		data = JSON.parse(r);
		for (dato of data){
			$("#form").before('<label for="">'+
								'<img src="public/imagenes/imgperfil/'+dato.foto_perfil+'" alt="">'+
							'</label>'+
							'<a href="#">'+dato.usuario+'</a>');
		}
	});
	$.post('index.php?controller=Usuario&action=listaAmigos', {idusuario: idusuario}, function(data, status) {
		if (data) {
			datos = JSON.parse(data);
			for (dato of datos){
				$("#listAmigos").append('<li><a href="#" id="'+dato.idusuario+'">'+dato.usuario+'</a><button onclick="mensaje('+idusuario+','+dato.idusuario+')" id="btnChat">Chat</button></li>');
				$("#nav").append('<li><a href="#">'+dato.usuario+'</a></li>');
			}
		}else{
			$("#listAmigos").append('<li>No tienes amigos aun</li>');
		}

	});
});


function mensaje(de, para) {
	$.post('index.php?controller=Usuario&action=chat', {de: de, para: para}, function(data, textStatus) {

	});
}

//href="index.php?controller=Usuario&action=chat"