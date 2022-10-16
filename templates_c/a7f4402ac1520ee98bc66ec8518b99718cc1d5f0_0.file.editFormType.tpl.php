<?php
/* Smarty version 4.2.1, created on 2022-10-14 22:21:57
  from 'C:\xampp\htdocs\WEB2\tp1 especial web2\templates\editFormType.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6349c4e577ad52_86462307',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7f4402ac1520ee98bc66ec8518b99718cc1d5f0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\WEB2\\tp1 especial web2\\templates\\editFormType.tpl',
      1 => 1665778896,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6349c4e577ad52_86462307 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
 <form action="uploadType/<?php echo $_smarty_tpl->tpl_vars['type']->value->Id_type;?>
" method="POST" class="my-4">
  <label for="clase">Añadir clase</label>
  <input name="type" type="text" class="form-control" id="clase" placeholder="Tipo de Libro" value="<?php echo $_smarty_tpl->tpl_vars['type']->value->type;?>
">
  <label for="pasillo">pasillo</label>
  <input name="pasillo" type="number" class="form-control" id="pasillo" placeholder="Pasillo" value="<?php echo $_smarty_tpl->tpl_vars['type']->value->pasillo;?>
">
  <button type="submit" class="btn btn-primary">Cargar</button>
</form>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
