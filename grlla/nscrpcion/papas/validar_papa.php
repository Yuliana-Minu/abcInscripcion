<div class="row">
    <div class="col-sm-8">
        <div class="form-group">
            <label class="font-weight-bold">Ingrese el número de identificación *</label>
            <input type="number" class="form-control caja_texto_sizer" id="identificacion_papa">
            <div class="alert alert-danger alerta-forcliente" id="error_id_papa" role="alert"></div>
        </div>
    </div>
    <div class="col-sm-2">
        <br>
        <i class="fas fa-search fa-2x" style="color: red;" onclick="validarPadre();"></i>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 capaValidacion" style="display:none">
        <p class="sms_validacion" style="font-size: 18px; font-weight: bold;"></p>
        <button type="button" class="btn btn-success" style="font-weight: bold;" onclick="si();" id="botonSi"> <i class="fas fa-check"></i> Si</button>
        <button type="button" class="btn btn-warning" style="color: #fff; font-weight: bold;" onclick="no();"> <i class="fas fa-window-close"></i> No</button>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">&nbsp;</div>
</div>

<script type="text/javascript">
    function validarPadre() {
        var identificacion_papa = $('#identificacion_papa').val();

        if(identificacion_papa == '' || identificacion_papa == 0){
            $("#error_id_papa").fadeIn('300');
            $("#error_id_papa").html('Debe ingresar el número de identificación');
            document.getElementById("identificacion_papa").focus();
            return false;
        }
        else{
            $("#error_id_papa").fadeOut('300');
        }

        $('.capaValidacion').fadeIn(100);
        $('.sms_validacion').html('¿Esta seguro que el número de identificación es: '+identificacion_papa+'?')
    }

    function no() {
        $('.capaValidacion').fadeOut(100);
        $('.sms_validacion').html('')
    }

    function si() {
        var identificacion_papa = $('#identificacion_papa').val();
        var identificacion_ninio = $('#txtIdentificacion').val();

        $.ajax({
            type: "POST",
            url: 'vincularpadresninio',
            data: "identificacion_papa="+identificacion_papa+'&rol=1',
            async:true,
            success: function (data, status) {
                window.location.replace('procesoninio?'+identificacion_ninio);
            }
        });

        return false;
    }
</script>