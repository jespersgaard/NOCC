<?php

  function i18n_merge($func_str_translation = NULL, $func_str_insert = NULL, $func_convert = 1) {
  
    if ((!is_null($func_str_translation)) && (!is_null($func_str_insert))) {
      
      $func_output = sprintf($func_str_translation, $func_str_insert);
      
      if ($func_convert == 1) {
        $func_output = convertLang2Html($func_output);
      }
      
      return $func_output;
    }

    return FALSE;
  }