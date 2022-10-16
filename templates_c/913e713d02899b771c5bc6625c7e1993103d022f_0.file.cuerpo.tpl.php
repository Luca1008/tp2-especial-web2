<?php
/* Smarty version 4.2.1, created on 2022-10-14 23:48:37
  from 'C:\xampp\htdocs\WEB2\tp1 especial web2\templates\cuerpo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6349d9354adab4_77225443',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '913e713d02899b771c5bc6625c7e1993103d022f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\WEB2\\tp1 especial web2\\templates\\cuerpo.tpl',
      1 => 1665784111,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6349d9354adab4_77225443 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1>Tabla de tipos</h1>
<div class="list-group">
  
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Types']->value, 'Type');
$_smarty_tpl->tpl_vars['Type']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['Type']->value) {
$_smarty_tpl->tpl_vars['Type']->do_else = false;
?>
    <a href="showFiltro/<?php echo $_smarty_tpl->tpl_vars['Type']->value->Id_type;?>
" class="list-group-item list-group-item-action"><?php echo $_smarty_tpl->tpl_vars['Type']->value->type;?>
 ------> <?php echo $_smarty_tpl->tpl_vars['Type']->value->pasillo;?>
</a>
    <?php if ((isset($_SESSION['USER_ID']))) {?>
      <a href="editType/<?php echo $_smarty_tpl->tpl_vars['Type']->value->Id_type;?>
"><button>Editar</button></a>
      <a href="deleteType/<?php echo $_smarty_tpl->tpl_vars['Type']->value->Id_type;?>
"><button>Borrar</button></a>
    <?php }?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  <a href="beginning" class="list-group-item list-group-item-action">Sacar filtro</a>
  </div>
  <?php if ((isset($_SESSION['USER_ID']))) {?>


     <form action="addType" method="POST" class="my-4">
      <label for="clase">Añadir clase</label>
      <input name="type" type="text" class="form-control" id="clase" placeholder="Tipo de Libro">
      <label for="pasillo">pasillo</label>
      <input name="pasillo" type="number" class="form-control" id="pasillo" placeholder="Pasillo">
      <button type="submit" class="btn btn-primary">Cargar</button>
    </form>
  <?php }?>


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
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Articles']->value, 'Article');
$_smarty_tpl->tpl_vars['Article']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['Article']->value) {
$_smarty_tpl->tpl_vars['Article']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['Article']->value->nombre_libro;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['Article']->value->type;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['Article']->value->autor;?>
</td>
                <td>$<?php echo $_smarty_tpl->tpl_vars['Article']->value->precio;?>
</td>
                <th><a href="description/<?php echo $_smarty_tpl->tpl_vars['Article']->value->id_article;?>
">Mostrar Descripción</a></th>
                <?php if ((isset($_SESSION['USER_ID']))) {?>
                  <td><a href="editArticle/<?php echo $_smarty_tpl->tpl_vars['Article']->value->id_article;?>
"><button>Editar</button></a>
                  <a href="deleteArticle/<?php echo $_smarty_tpl->tpl_vars['Article']->value->id_article;?>
"><button>Borrar</button></a></td>
                <?php }?>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table></div>
<?php if ((isset($_SESSION['USER_ID']))) {?>
  <form action="addArticle" method="POST" class="formulario">
    <label for="nomLibro">Titulo de la obra</label>
    <input type="text" class="form-control" name="nomLibro" placeholder="Titulo">
    <label for="typeLibro">Tipo de Libro</label>
    <select name="typeLibro" id="typeLibro">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Types']->value, 'Type');
$_smarty_tpl->tpl_vars['Type']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['Type']->value) {
$_smarty_tpl->tpl_vars['Type']->do_else = false;
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['Type']->value->Id_type;?>
"><?php echo $_smarty_tpl->tpl_vars['Type']->value->type;?>
</option>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select>
    <label for="autor">Autor</label>
    <input type="text" class="form-control" name="autor" placeholder="Autor">
    <label for="precio">Precio</label>
    <input type="number" class="form-control" name="precio" placeholder="Valor">
    <label for="des">Descripción</label>
    <input type="text" class="form-control" name="des" placeholder="Descripción">
    <button type="submit" class="btn btn-primary">Subir</button>
  </form>
<?php }?>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
