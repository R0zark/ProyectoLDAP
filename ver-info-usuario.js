$(".gradeX td").click(function(){
    nombre= $(this).text();
    var parametros = {
            "accion" : "buscar-o",
            "objetivo": "usuario",
            "nombre" : nombre,
      };
      $.ajax({
            data:  parametros,
            url:   'resp.php',
            type:  'post',
            success:  function (response) {
                                          var array = JSON.parse(response);
                                          $(".input-nombre").val(array[0]);
                                          $(".input-descripcion").val(array[1]);
                                          
            }
      });  

})