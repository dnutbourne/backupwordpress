<?php

namespace HM\BackUpWordPress;

class Zip_Archive_File_Backup_Engine_Tests extends File_Backup_Engine_Common_Tests {

	protected $backup;

	public function setUp() {
		$this->backup = new Zip_Archive_File_Backup_Engine;
		parent::setUp();
	}


}