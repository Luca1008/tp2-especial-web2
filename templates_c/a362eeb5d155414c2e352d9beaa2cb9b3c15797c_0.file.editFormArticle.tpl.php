<?php
/* Smarty version 4.2.1, created on 2022-10-16 16:57:58
  from 'C:\xampp\htdocs\WEB2\tp1 especial web2\templates\editFormArticle.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_634c1bf6e4ed10_59417369',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a362eeb5d155414c2e352d9beaa2cb9b3c15797c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\WEB2\\tp1 especial web2\\templates\\editFormArticle.tpl',
      1 => 1665932248,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_634c1bf6e4ed10_59417369 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<form action="uploadArticle/<?php echo $_smarty_tpl->tpl_vars['Types']->value->id_article;?>
" method="POST" class="formulario">
<label for="nomLibro">Titulo de la obra</label>
<input type="text" class="form-control" name="nomLibro" placeholder="Titulo" value="<?php echo $_smarty_tpl->tpl_vars['Types']->value->nombre_libro;?>
">
<label for="typeLibro">Tipo de Libro</label>
<select name="typeLibro" id="typeLibro">
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lists']->value, 'list');
$_smarty_tpl->tpl_vars['list']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->do_else = false;
?>
      <option value="<?php echo $_smarty_tpl->tpl_vars['list']->value->Id_type;?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value->type;?>
</option>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</select>
<label for="autor">Autor</label>
<input type="text" class="form-control" name="autor" placeholder="Autor" value="<?php echo $_smarty_tpl->tpl_vars['Types']->value->autor;?>
">
<label for="precio">Precio</label>
<input type="number" class="form-control" name="precio" placeholder="Valor" value="<?php echo $_smarty_tpl->tpl_vars['Types']->value->precio;?>
">
<label for="des">Descripción</label>
<input type="text" class="form-control" name="des" placeholder="Descripción" value="<?php echo $_smarty_tpl->tpl_vars['Types']->value->description;?>
">
<button type="submit" class="btn btn-primary">Subir</button>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
