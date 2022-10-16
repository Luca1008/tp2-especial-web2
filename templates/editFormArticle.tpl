{include file="header.tpl"}

<form action="uploadArticle/{$Types->id_article}" method="POST" class="formulario">
<label for="nomLibro">Titulo de la obra</label>
<input type="text" class="form-control" name="nomLibro" placeholder="Titulo" value="{$Types->nombre_libro}">
<label for="typeLibro">Tipo de Libro</label>
<select name="typeLibro" id="typeLibro">
  {foreach from=$lists item=$list}
      <option value="{$list->Id_type}">{$list->type}</option>
  {/foreach}
</select>
<label for="autor">Autor</label>
<input type="text" class="form-control" name="autor" placeholder="Autor" value="{$Types->autor}">
<label for="precio">Precio</label>
<input type="number" class="form-control" name="precio" placeholder="Valor" value="{$Types->precio}">
<label for="des">Descripción</label>
<input type="text" class="form-control" name="des" placeholder="Descripción" value="{$Types->description}">
<button type="submit" class="btn btn-primary">Subir</button>

{include file="footer.tpl"}