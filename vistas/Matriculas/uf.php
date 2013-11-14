<?php include_once "../../datos/Querys.php";
if(!Query::BuscarUFDate(date('Y-m-d'))){ ?>
    <script>
        $(document).ready(function() {
            $("#modalUF").modal('show');
        });
    </script>
<?php } ?>
<div id="modalUF" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Valores UF</h3>
    </div>
    <div class="modal-body">
        <form action="javascript:GUF()"
        <h4>El valor de la UF se encuentra desactualizado .</h4>
        <p>Ingrese el valor de la UF del Dia de Hoy .</p>
        <a href="#"><input type="text" placeholder="ej 12345.67" id="valuf" class="input-large" pattern=".{7,10}" ></a>
        <p><small>Valores los puede encontrar en</small> <a href="http://www.sii.cl/pagina/valores/uf/uf2013.htm#contenido" target="_blank" onClick="window.open(this.href, this.target, 'width=870,height=700'); return false;">SII Valores UF</a></p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" type="submit">Guardar Cambios</button>
        </form>
    </div>
</div>
<script>
    function GUF(){
        var UF = $("#valuf").val();
        $.ajax({
            url: "../../ajax/uf.php",
            data: {UF:UF},
            type: "POST",
            success: function(data) {
                if(data==1){
                    alert('Cambios Guardados Correctamente');
                    $('#modalUF').modal('hide');
                }
                else{
                    $("#modalUF").html("Ha Ocurrido un Error");
                    location.reload();


                }
            }
        });
    }
    $(function () {
        $('#valuf').popover({
            title: 'Ultimo Valor Conocido',
            <?php $ufpasada=Query::BuscarUF();?>
            content: '<?php echo "".$ufpasada['Valor']." - ".$ufpasada['Fecha'].""; ?>',
            placement: 'right'
        });
    });
</script>