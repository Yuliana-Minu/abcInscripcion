<?php
    include('crud/rs/afldo/afldo.php');

    include('prcsos/prsna/rsPersona.php');

    $rspersona=new RsPersona();

    $codigo_persona = $_REQUEST['codigo_persona'];
    $identificacion_ninio = $_REQUEST['identificacion_ninio'];
  
    $url_direccion="procesoninio?".$identificacion_ninio;

    $nombre_persona = $rspersona->nombre_persona($codigo_persona);

    $foto_persona = $rspersona->foto_persona($codigo_persona);


?>
<form id="formFoto" role="form" enctype="multipart/form-data">
    <div class="modal-header fondo-titulo">
        <h3 class="modal-title"><strong>FOTO <?php echo strtoupper($nombre_persona); ?></strong></h3>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <p class="font-weight-bold">* Campos obligatorios</p>
        <!-- ******************** INICIO FORMULARIO ************************* -->

        <div class="row">
            <div class="col-sm-12" id="carga_guardar" style="display:none">
                <img src="img/carga_form.gif" width="150px" height="150px"/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="imgInp" class="font-weight-bold">Imagen</label>
                    <input type="file" id="files" accept="image/*"  name="files" onblur="cargarfoto();"/>
                    <span class="help-block" id="error"></span>
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-md-12" id="preview">
                <output id="list" >
                    <img id="blah" style="width: 350px;"  src="<?php echo $foto_persona; ?>" alt="Tu imagen" />  
                </output> 
            </div>
        </div>


    </div>
    <div class="modal-footer">
        <input type="hidden" id="url_direccion" value="<?php echo $url_direccion; ?>">
        <input type="hidden" id="capa" value="<?php echo $capa; ?>">
        <input type="hidden" id="accion" value="<?php echo $accion; ?>">
        <input type="hidden" id="codigo_persona" name="codigo_persona" value="<?php echo $codigo_persona; ?>">
        <input type="hidden" name="url" id="url" value="<?php echo $url_guardar; ?>">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="far fa-times-circle"></i> Cerrar</button>
        <button type="submit" class="btn btn-danger btn-sm" id="botonGuardar" onclick="validar_foto();"><i class="far fa-save"></i> Guardar</button>
    </div>
</form>

<script src="js/jquery.validate.min.js"></script>
<script src="vjs/vldar_foto.js"></script>
<script type="text/javascript">
function cargarfoto(){
    function archivo(evt) {
        var files = evt.target.files; // FileList object
             
         // Obtenemos la imagen del campo "file".
         for (var i = 0, f; f = files[i]; i++) {
              //Solo admitimos imágenes.
            if (!f.type.match('image.*')) {
                 continue;
             }
             
             var reader = new FileReader();
             
             reader.onload = (function(theFile) {
             return function(e) {
             // Insertamos la imagen
              document.getElementById("list").innerHTML = ['<img style="width: 350px;" class="thumb" id="foto" name="foto" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                        };
            })(f); 
            reader.readAsDataURL(f);
          }
    }           
    document.getElementById('files').addEventListener('change', archivo, false);
}
</script>
