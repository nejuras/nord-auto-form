<?php
use Model\AutoModel;

include $document_root . '/nordcode/src/Model/AutoModel.php';

if($_POST) {
    $automodel = new AutoModel();
    $automodel->insert();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="src/css/auto.css">
    <title><?php echo $title ?></title>
  </head>
<body>
  <div id="top">
    <a class="nordcode-link" href="/nordcode/index.php" target="_blank">Nordcode</a>
  </div>
  <div id="main">
    <div id="skelbimasModal" class="skelbimasmodal">
      <div class="modal-skelbimas">
      <div id="form">
        <form action="" method="post" name="autoform" onsubmit="return validateForm();">
          <label for="marke">Markė: </label>
          <select class="marke" id="marke" name="marke" onchange="selectChange()">
            <option value="none">- pasirinkti -</option>
            <option value="audi">Audi</option>
            <option value="bmw">BMW</option>
            <option value="opel">OPEL</option>
          </select>
          <label for="model">Modelis: </label>
          <select class="before-model" id="none" name="model" data-model="data-model">
            <option value="none">- Prieštai pasirinkite markę -</option>
          </select>
          <select class="model" id="audi" name="model">
            <option value="none">- pasirinkti -</option>
            <option value="100">100</option>
            <option value="r8">R8</option>
            <option value="a7">A7</option>
          </select>
          <select class="model" id="bmw" name="model">
            <option value="none">- pasirinkti -</option>
            <option value="m6">M6</option>
            <option value="m5">M5</option>
            <option value="m2">M2</option>
          </select>
          <select class="model" id="opel" name="model">
            <option value="none">- pasirinkti -</option>
            <option value="astra">Astra</option>
            <option value="corsa">Corsa</option>
            <option value="frontera">Frontera</option>
          </select>
          <label for="kaina">Kaina: </label>
          <input type="text"  name="kaina" placeholder="Įrašykite kainą">
          <div class="checkbox">

          <label for="savybes">Savybės: </label><br>
          <fieldset>
            <input type="checkbox" name="odinis_s" value="1">Odinis salonas<br>
            <input type="checkbox" name="oro_k" value="1">Oro kondicionierius<br>
          </fieldset>
          <fieldset>
            <input type="checkbox" name="klimato_k" value="1">Klimato kontrolė<br>
            <input type="checkbox" name="sildomos_s" value="1">Šildomos sėdynės<br>
          </fieldset>
          </div>
          <label for="komentaras">Komentaras: </label>
          <textarea name="komentaras" cols="30" rows="5"></textarea>
          <div id="klaida"></div>
          <input class="submit-btn" type="submit" name="submit" value="Skelbti">
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<script>
   /* window.onclick = function(event) {
        var modal = document.getElementById('skelbimasModal');
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }*/
</script>
<script>

    function validateForm() {
        var selectIdsPush = [];
        var kaina = document.forms["autoform"]["kaina"];
        var selectIds = document.querySelectorAll('select[id]');

        Array.prototype.forEach.call( selectIds, function( el, i ) {
            var selectOptions = el.options[el.selectedIndex].value;
            if ( el.id === "none") {
                document.getElementById(el.id).style.borderColor = "red";
                return false;

            } else if (selectOptions === "none") {
                //console.log(el.id+'---'+selectOptions);
                document.getElementById(el.id).style.borderColor = "red";
                return false;

            } else {
                document.getElementById(el.id).style.borderColor = "";
                selectIdsPush.push(el.id);
            }
        });
        if ((kaina.value === "") || isNaN(kaina.value) ) {
            kaina.style.borderColor = "red";
            document.getElementById("klaida").innerHTML =
                "Jūs neužpildėte arba neteisingai užpildėte duomenis.";
        } else {
            kaina.style.borderColor = "";
            selectIdsPush.push(kaina.value);
        }
        //console.log(selectIdsPush);
        return (selectIdsPush.length === 3);// {
            //return true;
        //} else {
            //return false;
        //}

    }

    function selectChange() {
        var ids = document.querySelectorAll('select[id]');
        var marke1 = document.getElementById("marke");
        var marke =  marke1.options[marke1.selectedIndex].value;
        Array.prototype.forEach.call( ids, function( el, i ) {
            if  (marke === el.id) {
                document.getElementById(el.id).style.display = "block";

            } else {
                document.getElementById(el.id).style.display = "none";
                document.getElementById(el.id).setAttribute('name', 'none-model');
                document.getElementById("marke").setAttribute('name', 'marke');
                document.getElementById("marke").style.display = "block";
            }
        });
    }
/*
  document.getElementById("add").onclick = function() {
      document.getElementById('skelbimasModal').style.display = "block";
  }
*/
</script>