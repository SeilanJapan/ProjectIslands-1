<?php

	//Validation input data

function test_input($data) {  
				   $data = trim($data);
				   $data = stripslashes($data);
				   $data = addslashes($data);
				   $data = addcslashes($data, ';|<>\'"');
				   $data = htmlspecialchars($data);
				   $data = quotemeta($data);
				   return $data;
				}