<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>VISTA</title>
    <script src="jquery-1.9.1.js" charset="utf-8"></script>
    <script type="text/javascript">
      $(document).on("ready",function(){
        cargarDpto();
        function cargarDpto(){
          console.log("Cargando Departamentos");
          $.post('controlador.php',{
            action: "Buscar"
          }, function(response){
            $("select#selectDpto").html(response);
            console.log('response: ',response);
            $("input#codDepto").val('');
            $("input#nombreDepto").val('');
            $("input#ciudad").val('');
            $("input#director").val('');
          });
        };

        console.log("Cargando DOM");
        $("button#guardarDpto").on("click",function(){
            console.log("ALMACENANDO");

            var codDepto = $("input#codDepto").val();
            var nombreDepto = $("input#nombreDepto").val();
            var ciudad = $("input#ciudad").val();
            var director = $("input#director").val();

            $.post('controlador.php',{
                action: "Guardar" ,
                codDepto: codDepto,
                nombreDepto: nombreDepto,
                ciudad: ciudad,
                director: director
              }, function(response){
                console.log('response: ',response);
                  cargarDpto();
              });
        });


        $("button#borrarDpto").on("click",function(){
          var codDepto = $("select#selectDpto").val();
          console.log(codDepto);

          $.post('controlador.php',{
            action: "Borrar",
            codDepto: codDepto
          },function(response){
            if (response=="OK"){
              $("select#selectDpto option[value="+codDepto+"]").remove();
                cargarDpto();
            }
            console.log('response',response);
          });
        });

        $('select#selectDpto').on("change",function(){
          console.log($(this).val());
          var codDepto = $("select#selectDpto").val();

          if(codDepto!=''){
            $.post('controlador.php',{
              action: "BuscarID",
              codDepto: codDepto
            },function(response){
              setTimeout(function(){
                var departamento =  $.parseJSON(response);

                  console.log('codDepto: ',departamento.codDepto);
                  console.log('nombreDpto: ',departamento.nombreDpto);
                  console.log('ciudad: ',departamento.ciudad);
                  console.log('director: ',departamento.director);
                  $("input#codDepto").val(departamento.codDepto);
                  $("input#nombreDepto").val(departamento.nombreDpto);
                  $("input#ciudad").val(departamento.ciudad);
                  $("input#director").val(departamento.director);

              },2000)

            })
          }
        })

      });
    </script>
  </head>
  <body>
    <span>codDepto</span><br> <input type="text" name="" id="codDepto" value="" /><br>
    <span>nombreDpto</span><br> <input type="text" name="" id="nombreDepto" value="" /><br>
    <span>ciudad</span><br> <input type="text" name="" id="ciudad" value="" /><br>
    <span>director</span><br> <input type="text" name="" id="director" value="" /><br>
    <button type="button" name="button" id="guardarDpto">ALMACENAR</button><br><br>
    <select class="" name="" id="selectDpto">
    </select><br><br>
    <button type="button" name="button" id="borrarDpto">BORRAR</button>
  </body>
</html>
