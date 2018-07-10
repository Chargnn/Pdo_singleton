Usage: 


<?php
 
foreach (SPDO::getInstance()->query('SELECT id, name, lastname FROM member') as $member)
{
  echo print_r($member);
}
