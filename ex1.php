<?php 

function __autoload($className) {
  if ($className != '') {
    require($className.'.php');
  }
}


function boostrap() {
  echo 'iniciando';
  $produto = new Produto();
  echo $produto->nome;
}


boostrap();