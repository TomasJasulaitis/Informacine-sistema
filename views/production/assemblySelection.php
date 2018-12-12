<?php 
  session_start();
  $_SESSION['prefix'] = "../../";
  $_SESSION['currentPage'] = "assemblySelection";
	include_once '../header.php';
?>


    <h1 class="h2 text-center">Telefono komplektacijos pasirinkimas</h1>
    <form name="form" method="post" action="../../controllers/production/proc_addOrder.php">>
      <div class="text-center" style="margin-right:30%; margin-left:30%">
        <div class="form-group">
           <label for="exampleFormControlSelect2">Pasirinkite telefono markę</label>
    <select multiple class="form-control" id="brand" name="brand">
      <option id="brand" name="brand" value="Samsung">Samsung</option>
      <option id="brand" name="brand" value="Iphone">iPhone</option>
      <option id="brand" name="brand" value="Huawei">Huawei</option>
      <option id="brand" name="brand" value="Sony">Sony</option>
      <option id="brand" name="brand" value="Nokia">Nokia</option>
    </select>
        </div>
        <div class="form-group">
          <label for="lastName">Įveskite telefono modelį</label>
          <input type="text" class="form-control" id="model" name="model">
        </div>
        <div class="form-group">
            <label for="id">Pasirinkite telefono spalvą</label>
            <input type="text" class="form-control" id="color" name="color">
        </div>
         <div class="form-group">
          <label for="lastName">Įveskite telefono atminties dydį</label>
          <input type="number" class="form-control" id="memory_size" name="memory_size">
        </div>
        <div class="form-group">
            <label for="pass">Įveskite RAM atminties dydį</label>
            <input type="number" class="form-control" id="ram_size" name="ram_size">
        </div>
        <button name="submit" type="submit" class="btn btn-success form-control">Patvirtinti</button>
        <a href="productionMain.php" class="btn btn-secondary btn-md form-control mt-2" role="button" aria-pressed="true">Atgal</a>
      </div>
    </form>
  </div>





<?php 
	include_once '../footer.php';
?>