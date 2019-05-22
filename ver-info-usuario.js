$(".gradeX td").click(function(){
    nombre= $(this).text();
    var parametros = {
            "accion" : "buscar-o",
            "objetivo": "usuario",
            "usuario" : nombre,
            "nombre": null,
            "apellidos": null,
            "contrasenya": null,
            "id": null,
            "idgrupo": null,
            "contrasenya": null,
      };
      $.ajax({
            data:  parametros,
            url:   'resp.php',
            type:  'post',
            success:  function (response) {
                                          
                                          var array = JSON.parse(response);
                                          $(".input-nombre").val(array[0]);
                                          $(".input-apellidos").val(array[1]);
                                          $(".input-usuario").val(array[2]);
                                          $(".input-id").val(array[3]);     
                                          $(".grupos-disponibles option[value='"+ array[4]+"']").attr("selected",true)      
            }
      });  

})