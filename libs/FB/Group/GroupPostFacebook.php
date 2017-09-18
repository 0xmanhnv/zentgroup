<?php
	
	class GroupPostFacebook
	{
		var $id;
		var $idGroup;
		var $content;
		var $timePost;

		function __construct($id,$idGroup, $content; $timePost)
		{
			$this->id = $id;
			$this->idGroup = $idGroup;
			$this->content = $content;
			$this->timePost = $timePost;
		}

		function setId($id){
			$this->id = $id;
		}
		function setIdgroup($idGroup){
			$this->id = $idGroup;
		}
		function setContent($content){
			$this->content = $content;
		}
		function setTime($timePost){
			$this->timePost = $timePost;
		}

		function getId(){
			return $this->id;
		}
		function getIdgroup(){
			return $this->id;
		}
		function getContent(){
			return $this->content;
		}
		function getTime(){
			return $this->timePost;
		}
	}

 ?>