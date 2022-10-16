{include file="header.tpl"}

<h1>Tabla de tipos</h1>
<div class="list-group">
  
{foreach from=$Types item=$Type}
    <a href="showFiltro/{$Type->Id_type}" class="list-group-item list-group-item-action">{$Type->type} ------> {$Type->pasillo}</a>
    {if isset($smarty.session.USER_ID)}
      <a href="editType/{$Type->Id_type}"><button>Editar</button></a>
      <a href="deleteType/{$Type->Id_type}"><button>Borrar</button></a>
    {/if}
  {/foreach}
  <a href="beginning" class="list-group-item list-group-item-action">Sacar filtro</a>
  </div>
  {if isset($smarty.session.USER_ID)}


     <form action="addType" method="POST" class="my-4">
      <label for="clase">Añadir clase</label>
      <input name="type" type="text" class="form-control" id="clase" placeholder="Tipo de Libro">
      <label for="pasillo">pasillo</label>
      <input name="pasillo" type="number" class="form-control" id="pasillo" placeholder="Pasillo">
      <button type="submit" class="btn btn-primary">Cargar</button>
    </form>
  {/if}


<div id="table2"><h2>Tabla de Articulos</h2>
<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Autor</th>
            <th>Precio</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    {foreach from=$Articles item=$Article}
            <tr>
                <td>{$Article->nombre_libro}</td>
                <td>{$Article->type}</td>
                <td>{$Article->autor}</td>
                <td>${$Article->precio}</td>
                <th><a href="description/{$Article->id_article}">Mostrar Descripción</a></th>
                {if isset($smarty.session.USER_ID)}
                  <td><a href="editArticle/{$Article->id_article}"><button>Editar</button></a>
                  <a href="deleteArticle/{$Article->id_article}"><button>Borrar</button></a></td>
                {/if}
            </tr>
        {/foreach}
    </tbody>
</table></div>
{if isset($smarty.session.USER_ID)}
  <form action="addArticle" method="POST" class="formulario">
    <label for="nomLibro">Titulo de la obra</label>
    <input type="text" class="form-control" name="nomLibro" placeholder="Titulo">
    <label for="typeLibro">Tipo de Libro</label>
    <select name="typeLibro" id="typeLibro">
      {foreach from=$Types item=$Type}
          <option value="{$Type->Id_type}">{$Type->type}</option>
      {/foreach}
    </select>
    <label for="autor">Autor</label>
    <input type="text" class="form-control" name="autor" placeholder="Autor">
    <label for="precio">Precio</label>
    <input type="number" class="form-control" name="precio" placeholder="Valor">
    <label for="des">Descripción</label>
    <input type="text" class="form-control" name="des" placeholder="Descripción">
    <button type="submit" class="btn btn-primary">Subir</button>
  </form>
{/if}


{include file="footer.tpl"}