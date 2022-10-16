<?php
/* Smarty version 4.2.1, created on 2022-10-15 00:53:13
  from 'C:\xampp\htdocs\WEB2\tp1 especial web2\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6349e8596ae934_54262943',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9edfb4fa6a0e1a3ff6e88e126611f11e5a220c5b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\WEB2\\tp1 especial web2\\templates\\header.tpl',
      1 => 1665787989,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6349e8596ae934_54262943 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo BASE_URL;?>
">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>The library</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="beginning">Libreria</a>
              <?php if (!(isset($_SESSION['USER_NAME']))) {?>
                <a class="nav-link" aria-current="page" href="login">Login</a>
                <?php } else { ?>
                   <a class="nav-link nav-item navbar-nav mb-2 mb-lg-0" href="logout">Logout <?php echo $_SESSION['USER_NAME'];?>
</a>
              <?php }?>

            </div>
          </nav>
    </header>

    <!-- inicio main container -->
    <main class="container">
<?php }
}
