$(document).ready(function(){

    $('#new-form').hide();

    $('#search-form').submit(function(event){
        var $id = $('#searchbox').val();
        event.preventDefault();
        $.ajax({
            url: Routing.generate('ud_enfermeria_reporte_search', {'id': $id}),
            data: {id: $id},
            statusCode: {
                404: function(){
                    alert('No existe el usuario');
                },
                500: function(){
                    alert('La peticion fallo');
                }
            }
        }).done(function(data){
            alert('El usuario existe');
            var iden = JSON.stringify(data[0].id);
            var nombres = JSON.stringify(data[0].nombres);
            var apellidos = JSON.stringify(data[0].apellidos);
            var eps = JSON.stringify(data[0].eps);
            var rh = JSON.stringify(data[0].rh);
            var telefonoc = JSON.stringify(data[0].telefonoContacto);
            console.log(data[0].id);
            $('#proyecto_enfermeriabundle_reporteemergencia_detalle').
                text('Identificacion: '+iden+ "\n" +'Nombres: '+nombres+"\n"+'Apellidos: '+apellidos+"\n"+
                     'Eps: '+eps+"\n"+"RH: "+rh+"\n"+'Telefono contacto: '+telefonoc);
            //$('#proyecto_enfermeriabundle_reporteemergencia_ssocial').text($id);
            $('#new-form').show();
            $('#searchbox').prop('readonly', true);
            $('.btn-search').hide();
        });
    });
});