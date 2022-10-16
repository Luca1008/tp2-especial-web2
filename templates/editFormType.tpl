{include file="header.tpl"}

</div>
 <form action="uploadType/{$type->Id_type}" method="POST" class="my-4">
  <label for="clase">Añadir clase</label>
  <input name="type" type="text" class="form-control" id="clase" placeholder="Tipo de Libro" value="{$type->type}">
  <label for="pasillo">pasillo</label>
  <input name="pasillo" type="number" class="form-control" id="pasillo" placeholder="Pasillo" value="{$type->pasillo}">
  <button type="submit" class="btn btn-primary">Cargar</button>
</form>

{include file="footer.tpl"}