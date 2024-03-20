
var tabla ;
var datos_empresa;

$(document).ready(function(){ 
    
    tabla=$('#empresa_data').dataTable({
        responsive : true,
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
        "ajax":{
            url: '../../controller/acercademicontrolador.php?op=listar_tabla',
            type : "get",
            dataType : "json",
            error: function(e){
                console.log(e);
            }
        },
		"bDestroy": true,
		"responsive": true,
		"bInfo":true,
		"iDisplayLength": 10,//Por cada 5 registros hace una paginación
	    "order": [[ 0, "asc" ]],//Ordenar (columna,orden)
	    "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
		}
	}).DataTable();

});

function init(){
    $("#empresa_form").on("submit",function(e){
        guardaryeditar(e);	
    });
}

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#empresa_form")[0]);

    $.ajax({
        url: "../../controller/acercademicontrolador.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            console.log(datos);
            $('#empresa_form')[0].reset();
            $("#modalmantenimiento").modal('hide');
            $('#empresa_data').DataTable().ajax.reload();
            swal.fire(
                'Registro!',
                'El registro correctamente.',
                'success'
            )
        }
    });
}



function editar(emp_id){
    console.log(emp_id);
    
    //$('#mdltitulo').html('Editar Registro');
    $.post("../../controller/acercademicontrolador.php?op=mostrar",{acer_id: emp_id},function(data){
        data = JSON.parse(data);
        console.log(data);
        $('#acer_id').val(data.id);
        $('#acer_mensaje').val(data.mensaje);
        //$('#art_cuerpo').val(data.texto);
    });

    $('#modalmantenimiento').modal('show');
}



$(document).on("click","#btnclosemodal", function(){
    $("#modalmantenimiento").modal('hide');
});
init();