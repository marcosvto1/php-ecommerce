<?php 

function __autoload($className) {
  if (file_exists($className.'.php') === true) {
    require_once($className.'.php');
  }
}

function includeCoreBase($className) {}

function includeCoreHttp($className) {
  if (file_exists('Core/Http/'. $className.'.php') === true) {
    require_once($className.'.php');
  }
}

spl_autoload_register('includeCoreHttp');

function boostrap() {
  echo 'iniciando';
  $produto = new Produto();
  echo $produto->nome;
}


boostrap();