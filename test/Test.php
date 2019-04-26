<?php

	use php\config\Config;
	
	class DependencyFailureTest extends TestCase {
		public function testOne() {
			$configObj = new Config();
			$this->connection = $configObj->getConnection();
		}
	}
?>