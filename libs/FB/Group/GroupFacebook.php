<?php
	class GroupFacebook
	{
		var $id;
		var $name;
		var $link;
		function __construct()
		{
			$this->id = null;
			$this->name = null;
			$this->link = null;	
		}

		function __construct($id, $name,)
		{
			$this->id = $id;
			$this->name = $name;	
		}

		function setId($id){
			$this->id = $id;
		}

		function setName($name){
			$this->name = $name;
		}
		function setLink($link){
			$this->link = $link;
		}

		function getId(){
			return $this->id;
		}

		function getName(){
			return $this->name;
		}
		function getLink(){
			return $this->link;
		}
	}
 ?>