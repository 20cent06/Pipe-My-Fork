/* 
 * Created on : 4 déc. 2014, 20:33:36
 * Author     : Pipe My Fork - Nuit de l'info 2014
 */

$( document ).ready(function(){
    $("#header-background").css("-webkit-animation", "header-background 3s linear alternate"); //Chrome, Safari, Opera
    $("#header-background").css("animation", "header-background 3s linear alternate"); //Standard syntax
    $("header ul li").css("-webkit-animation", "header-buttons 3s linear alternate"); //Chrome, Safari, Opera
    $("header ul li").css("animation", "header-buttons 3s linear alternate"); //Standard syntax
    $(".container").slideDown();
});