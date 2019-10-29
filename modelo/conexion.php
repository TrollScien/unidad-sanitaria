<?php

	class Conexion{

		static public function conectar(){

			$link = new PDO("mysql:post=localhost;dbname=crav2","root","");

			$link->exec("set names utf8");

			return $link;
		}
	}