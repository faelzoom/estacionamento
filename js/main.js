$(document).ready(function () {

  var atualizar = setInterval(function () {
  
    $("#horass").load("ativo.php #horass");
  
  }, 30000);
  return false;
  });



          var dezSegundos = 10000; // dez segundos em milissegundos
          var quinzeSegundos = 15000;

          function verificaHora() {
            var agora = new Date();
            var hoje = new Date(agora.getFullYear(), agora.getMonth(), agora.getDate());
            var msDesdeMeiaNoite = agora.getTime() - hoje.getTime();
            if (msDesdeMeiaNoite < quinzeSegundos) {
              window.location.href = 'deletatodos.php';
            }

          }
          setInterval(verificaHora, dezSegundos);