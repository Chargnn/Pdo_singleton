## Usage: 

<?php
 
foreach (**SPDO::getInstance()->query('SELECT id, name, lastname FROM member')** as $member)
{
  echo '<pre>', print_r($member) ,'</pre>';
}
