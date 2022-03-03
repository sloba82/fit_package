<?php
namespace Fit;

use \PHPUnit\Framework\TestCase;
use \Fit\PasswordGenerator;

class PasswordTest extends TestCase {

	private $passwordGeneratorService;
	protected function setUp()
	{
		$this->passwordGeneratorService = new PasswordGenerator();
	}

	public function testPassword() {

	 	$lowPass = $this->passwordGeneratorService->generatePassword(6,1);
		$mediumPass = $this->passwordGeneratorService->generatePassword(6,2);
		$highPass = $this->passwordGeneratorService->generatePassword(6,3);

		$this->assertEquals(1,preg_match("/^(?=.{6,}$)(?=(?:.*?[A-Z]){2})(?=.*?[a-z]).*$/", $lowPass));
		$this->assertEquals(1,preg_match("/^(?=.{6,}$)(?=(?:.*?[A-Z]){2})(?=.*?[a-z])(?=(?:.*?[2-5])).*$/", $mediumPass));
		$this->assertEquals(1,preg_match("/^(?=.*[!#$%&(\){\}[\]=]).*$/", $highPass));

	}

}