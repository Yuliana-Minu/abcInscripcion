<div id="signAreaDos" >
    <h2 class="tag-ingo">Firma de la Madre</h2>
    <div class="sig sigWrapper" style="height:auto;">
        <div class="typed"></div>
        <canvas class="sign-pad" id="sign-pad-dos" width="300" height="100"></canvas>

    </div>
</div> 

<script>
$(document).ready(function() {
    $('#signArea').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:94});
    $('#signAreaDos').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:94});
    $('#signAreaTres').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:94});
    $('#signAreaCuatro').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:94});
    
    $("#clear").on('click', function () {
        $.ajax({
            url:"camposvacio",
            type:"POST",
            data:"data",
            async:true,

            success: function(message){
                $(".signArea").empty().append(message);
            }
        });

        $.ajax({
            url:"campovaciodos",
            type:"POST",
            data:"data",
            async:true,

            success: function(message){
                $(".signAreaDos").empty().append(message);
            }
        });

        $.ajax({
            url:"campovaciotres",
            type:"POST",
            data:"data",
            async:true,

            success: function(message){
                $(".signAreaTres").empty().append(message);
            }
        });

        $.ajax({
            url:"campovaciocuatro",
            type:"POST",
            data:"data",
            async:true,

            success: function(message){
                $(".signAreaCuatro").empty().append(message);
            }
        });


    });
    
});
</script>