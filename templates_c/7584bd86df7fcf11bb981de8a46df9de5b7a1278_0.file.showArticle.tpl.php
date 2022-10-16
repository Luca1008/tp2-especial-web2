<?php
/* Smarty version 4.2.1, created on 2022-10-16 17:16:33
  from 'C:\xampp\htdocs\WEB2\tp1 especial web2\templates\showArticle.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_634c2051a56c46_67807837',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7584bd86df7fcf11bb981de8a46df9de5b7a1278' => 
    array (
      0 => 'C:\\xampp\\htdocs\\WEB2\\tp1 especial web2\\templates\\showArticle.tpl',
      1 => 1665933390,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_634c2051a56c46_67807837 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div>
  <div>
  <p><?php echo $_smarty_tpl->tpl_vars['article']->value->nombre_libro;?>
</p>
  <p><?php echo $_smarty_tpl->tpl_vars['article']->value->autor;?>
</p>
  <p>$<?php echo $_smarty_tpl->tpl_vars['article']->value->precio;?>
</p>
  <p><?php echo $_smarty_tpl->tpl_vars['article']->value->description;?>
</p>
  </div>
  <a href="beginning"><button>Volver</button></a>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
