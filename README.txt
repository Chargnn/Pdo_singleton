Usage: 

<?php
 
foreach (SPDO::getInstance()->query('SELECT id, name, phone FROM member m') as $member)
{
  echo '<pre>', print_r($member) ,'</pre>';
}
