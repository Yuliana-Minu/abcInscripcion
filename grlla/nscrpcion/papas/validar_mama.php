<div class="row">
    <div class="col-sm-8">
        <div class="form-group">
            <label class="font-weight-bold">Ingrese el número de identificación *</label>
            <input type="number" class="form-control caja_texto_sizer" id="identificacion_mama">
            <div class="alert alert-danger alerta-forcliente" id="error_id_mama" role="alert"></div>
        </div>
    </div>
    <div class="col-sm-2">
        <br>
        <i class="fas fa-search fa-2x" style="color: red;" onclick="validarMadre();"></i>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 capaValidacionMama" style="display:none">
        <p class="sms_validacionMama" style="font-size: 18px; font-weight: bold;"></p>
        <button type="button" class="btn btn-success" style="font-weight: bold;" onclick="siMama();"> <i class="fas fa-check"></i> Si</button>
        <button type="button" class="btn btn-warning" style="color: #fff; font-weight: bold;" onclick="noMama();"> <i class="fas fa-window-close"></i> No</button>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">&nbsp;</div>
</div>

<script type="text/javascript">
    function validarMadre() {
        var identificacion_papa = $('#identificacion_mama').val();

        if(identificacion_papa == '' || identificacion_papa == 0){
            $("#error_id_mama").fadeIn('300');
            $("#error_id_mama").html('Debe ingresar el número de identificación');
            document.getElementById("identificacion_papa").focus();
            return false;
        }
        else{
            $("#error_id_mama").fadeOut('300');
        }

        $('.capaValidacionMama').fadeIn(100);
        $('.sms_validacionMama').html('¿Esta seguro que el número de identificación es: '+identificacion_papa+'?')
    }

    function noMama() {
        $('.capaValidacionMama').fadeOut(100);
        $('.sms_validacionMama').html('')
    }

    function siMama() {
        var identificacion_papa = $('#identificacion_mama').val();
        var identificacion_ninio = $('#txtIdentificacion').val();

        $.ajax({
            type: "POST",
            url: 'vincularpadresninio',
            data: "identificacion_papa="+identificacion_papa+'&rol=2',
            async:true,
            success: function (data, status) {
                window.location.replace('procesoninio?'+identificacion_ninio);
            }
        });
        return false;
    }
</script>