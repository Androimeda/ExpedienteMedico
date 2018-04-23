<?php
  function valida($fecha){
    $p1 = '/^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})(\s)([0-1][0-9]|2[0-3])(:)([0-5][0-9])(:)([0-5][0-9])$/';
    $p2 = '/^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$/';
    $a = preg_match($p1,$fecha);
    $b = preg_match($p2,$fecha);
    return $a || $b;
  }

  function to_timestamp($str){
    if (valida($str)) {
      return "TO_TIMESTAMP('$str','dd/mm/yyyy hh24:mi:ss')";
    }else{
      return 'NULL';
    }
  }
?>