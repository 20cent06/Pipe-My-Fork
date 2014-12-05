<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$hote = 'localhost';
$bdd_login = 'root';
$bdd_mdp = '';
$bdd = 'pipe-my-fork';

mysql_connect($hote, $bdd_login, $bdd_mdp);
mysql_select_db($bdd);