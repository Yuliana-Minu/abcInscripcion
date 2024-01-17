<div class="row">
    <div class="col-sm-8">
        <div class="form-group">
            <label class="font-weight-bold">Ingrese el número de identificación *</label>
            <input type="number" class="form-control caja_texto_sizer" id="identificacion_acudiente">
            <div class="alert alert-danger alerta-forcliente" id="error_id_acudiente" role="alert"></div>
        </div>
    </div>
    <div class="col-sm-2">
        <br>
        <i class="fas fa-search fa-2x" style="color: red;" onclick="validarAcudiente();"></i>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 capaValidacionAcudiente" style="display:none">
        <p class="sms_validacionAcudiente" style="font-size: 18px; font-weight: bold;"></p>
        <button type="button" class="btn btn-success" style="font-weight: bold;" onclick="siAcu();"> <i class="fas fa-check"></i> Si</button>
        <button type="button" class="btn btn-warning" style="color: #fff; font-weight: bold;" onclick="noAcu();"> <i class="fas fa-window-close"></i> No</button>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">&nbsp;</div>
</div>

<script type="text/javascript">
    function validarAcudiente() {
        var identificacion_papa = $('#identificacion_acudiente').val();

        if(identificacion_papa == '' || identificacion_papa == 0){
            $("#error_id_acudiente").fadeIn('300');
            $("#error_id_acudiente").html('Debe ingresar el número de identificación');
            document.getElementById("identificacion_acudiente").focus();
            return false;
        }
        else{
            $("#error_id_acudiente").fadeOut('300');
        }

        $('.capaValidacionAcudiente').fadeIn(100);
        $('.sms_validacionAcudiente').html('¿Esta seguro que el número de identificación es: '+identificacion_papa+'?')
    }

    function noAcu() {
        $('.capaValidacionAcudiente').fadeOut(100);
        $('.sms_validacionAcudiente').html('')
    }

    function siAcu() {
        var identificacion_papa = $('#identificacion_acudiente').val();
        var identificacion_ninio = $('#txtIdentificacion').val();

        $.ajax({
            type: "POST",
            url: 'vincularpadresninio',
            data: "identificacion_papa="+identificacion_papa+'&rol=3',
            async:true,
            success: function (data, status) {
                window.location.replace('procesoninio?'+identificacion_ninio);
            }
        });
        return false;
    }
</script>