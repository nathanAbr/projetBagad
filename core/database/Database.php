<?php

class Database
{
	function connexionDB(){
		try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=dbbagad;charset=utf8', 'root', '');
			}
		catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}
	}
	

}