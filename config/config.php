<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$hote = 'localhost';
$bdd_login = 'user';
$bdd_mdp = 'user';
$bdd = 'pipe-my-fork';

$link = mysqli_connect($hote, $bdd_login, $bdd_mdp);
mysqli_select_db($link, $bdd);