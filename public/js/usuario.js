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
				$("#listAmigos").append('<li><a href="#" id="'+dato.idusuario+'">'+dato.usuario+'</a><a id="btnChat" href="index.php?controller=Usuario&action=chat&de='+idusuario+'&para='+dato.idusuario+'">Chat</a></li>');
				$("#nav").append('<li><a href="#">'+dato.usuario+'</a></li>');
			}
		}else{
			$("#listAmigos").append('<li>No tienes amigos aun</li>');
		}

	});

});

$("#btnChat").on('click', '#btnChat', function(event) {
	event.preventDefault();
	alert("dentro del chat");
});