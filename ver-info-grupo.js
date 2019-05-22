$(".gradeX td").click(function(){
    nombre= $(this).text();
    var parametros = {
            "accion" : "buscar-o",
            "objetivo": "grupo",
            "nombre" : nombre,
      };
      $.ajax({
            data:  parametros,
            url:   'resp.php',
            type:  'post',
            success:  function (response) {
                                          var array = JSON.parse(response);
                                          var dn = array[3];
                                          var ou = dn.split(',')[1]
                                          if(ou[0] == 'o'){
                                                var valor= ou.split('=')[1];
                                                $(".ou-disponibles option[value='"+valor+"']").attr("selected",true)                                       }
                                          else{
                                                $(".ou-disponibles option[value='']").attr("selected",true)
                                          }
                                          $(".input-nombre").val(array[0]);
                                          $(".input-id").val(array[1]);
                                          $(".input-descripcion").val(array[2]);                 
            }
      });  

})