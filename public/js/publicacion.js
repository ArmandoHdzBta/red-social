$(document).ready(function() {
	$.post('index.php?controller=Publicacion&action=verPost', function(data, status) {
		datos = JSON.parse(data);
		for(dato of datos){
			$("#cont-post").after('<div class="post" id="idpost">'+
				'<div class="datos">'+
					'<p><a href="#">'+dato.usuario+'</a></p>'+
					'<a href="#"><i class="fas fa-ellipsis-v"></i></a>'+
				'</div>'+
				'<div class="cont">'+
					((dato.texto) ? '<p>'+dato.texto : ''+'</p>')+
					((dato.foto) ? '<img src="public/imagenes/imgpublicacion/'+dato.foto+'">' : '')+
				'</div>'+
				'<div class="like">'+
					'<button><i class="fas fa-heart"></i> 11000</button>'+
				'</div>'+
				'<div class="coment">'+
					'<button><i class="fas fa-comment"></i> 20000</button>'+
				'</div>'+
			'</div>');
		}
	});
});