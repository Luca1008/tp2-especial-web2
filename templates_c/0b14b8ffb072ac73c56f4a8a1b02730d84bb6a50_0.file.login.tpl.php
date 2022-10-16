<?php
/* Smarty version 4.2.1, created on 2022-10-14 22:48:54
  from 'C:\xampp\htdocs\WEB2\tp1 especial web2\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6349cb36e35881_71783070',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b14b8ffb072ac73c56f4a8a1b02730d84bb6a50' => 
    array (
      0 => 'C:\\xampp\\htdocs\\WEB2\\tp1 especial web2\\templates\\login.tpl',
      1 => 1665780091,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6349cb36e35881_71783070 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="mt-5 w-25 mx-auto">
    <form method="POST" action="validate">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" required class="form-control" id="email" name="email" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" required class="form-control" id="password" name="password">
        </div>

        <?php if ($_smarty_tpl->tpl_vars['error']->value) {?> 
            <div class="alert alert-danger mt-3">
                <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

            </div>
        <?php }?>
        <button type="submit" class="btn btn-primary mt-3">Entrar</button>
    </form>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
