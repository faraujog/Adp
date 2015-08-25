<?php
?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">AVD 360º</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-book"></span> Cadastros</a>
          <ul class="dropdown-menu">
              <li><a href="cadastroEmpresa.php"><span class="glyphicon glyphicon-globe"></span> Empresas</a></li>
              <li><a href="cadastroDepart.php"><span class="glyphicon glyphicon-tasks"></span> Departamentos</a></li>
              <li><a href="cadastroFunc.php"><span class="glyphicon glyphicon-user"></span> Funcionários</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Questionários</a></li>
          </ul>
        </li>
        <li><a href="#"><span class="glyphicon glyphicon-plus"></span> Link 2</a></li>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-print"></span> Relatórios<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Link1</a></li>
            <li><a href="#">link2</a></li>
          </ul>                                     
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
     <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Pesquisar">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
      </form>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

