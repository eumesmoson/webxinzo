function enviamos(a){
alert("ano: "+a);
$.ajax({
        type:  'POST',
        url:   'datospoboacion.php',
        data:  { "ano":a }
         }).done(function( msg ) {
         $("#taboa").html(msg);
         }).fail(function (jqXHR, textStatus, errorThrown){
          alert("Se ha producido un error: "+ textStatus +" "+ errorThrown);
        });

}
