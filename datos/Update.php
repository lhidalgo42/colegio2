<?php
include_once('llamarQuery.php');
class Update {
		public static function SQL($sql) {
        $query = CallQuery($sql);
		return $query; 
	}
   }
?>