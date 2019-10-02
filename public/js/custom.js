function searchCiiu(id){
    url = '/sistema/buscar/ciiu';
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: url,
        type: 'POST',
        cache: false,
        data: {'id':id},                
        // beforeSend: function(xhr){
        // xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
        // },
        success:function(respu){
            console.log(respu);
            $("#actividad_economica_principal").val(respu.tipo);  

              if ( jQuery.isEmptyObject(respu)) {
                  $("#actividad_economica_principal").val("El código no esta disponible");
                      $("#id_codigo_CIIU").val('');  
              }
                        
              },
            error: function(xhr, textStatus, thrownError) {
              
            }
        
    });
}
