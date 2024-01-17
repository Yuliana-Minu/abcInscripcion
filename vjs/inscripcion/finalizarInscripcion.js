function finalizarInscripcion(){
    var existe_fto_ninio = $('#existe_fto_ninio').val();
    var existe_fto_papa = $('#existe_fto_papa').val();
    var existe_fto_mama = $('#existe_fto_mama').val();
    var idUser = $('#ideNinio').val();

    if((existe_fto_ninio == 1) && (existe_fto_papa == 1) && (existe_fto_mama == 1)){
        $.ajax({
            url:"cierreinscripcion",
            type:"POST",
            data:"idUser="+idUser,
            async:true,

            success: function(message){
                window.location.replace('procesoninio?'+idUser);
            }
        });
    }
    else{
        $('.texto').html('Debe cargar todas las fotos ');
    }

    return false;
}