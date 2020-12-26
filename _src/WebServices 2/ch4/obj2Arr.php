<?php
function obj2Arr($obj)
{
 $result = NULL;
 if(!is_array($obj))
 {
  if($var = get_object_vars($obj))
  {
   foreach($var as $key => $value)
    $result[$key] = obj2Arr($value);
  }
  else
   return $obj;
 }
 else
 {
  foreach($obj as $key => $value)
   $result[$key] = obj2Arr($value);
 }
 return $result;
}

?>