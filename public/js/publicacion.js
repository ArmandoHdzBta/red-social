$(document).ready(function() {
	idusuario = $("#idusuario").val();
	$.post('index.php?controller=Publicacion&action=verPost', {idusuario: idusuario}, function(data, status) {
		datos = JSON.parse(data);
		for(dato of datos){
			$("#cont-post").after('<div class="post" id="idpost">'+
				'<div class="datos">'+
					'<p><a href="#">'+dato.usuario+'</a></p>'+
					'<a href="index.php?controller=Publicacion&action=eliminar&idpost='+dato.idusuario_post+'">Eliminar</a>'+
				'</div>'+
				'<div class="cont">'+
					((dato.texto) ? '<p>'+dato.texto : ''+'</p>')+
					((dato.foto) ? '<img src="public/imagenes/imgpublicacion/'+dato.foto+'">' : '')+
				'</div>'+
				'<div class="like">'+
					'<button id="btnLike" onclick="darLike('+dato.idusuario_post+')"><i class="fas fa-heart"></i> 10</button>'+
				'</div>'+
			'</div>');
		}
	});
});

function darLike(idpost) {
	idusuario = $("#idusuario").val();
	$.post('index.php?controller=Publicacion&action=like', {idpost: idpost, idusuario: idusuario}, function(r) {
		alert("Like");
	});
}