<?php defined("IN_FORMA") or die('Direct access is forbidden.');

/* ======================================================================== \
|   FORMA - The E-Learning Suite                                            |
|                                                                           |
|   Copyright (c) 2013 (Forma)                                              |
|   http://www.formalms.org                                                 |
|   License  http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt           |
|                                                                           |
|   from docebo 4.0.5 CE 2008-2012 (c) docebo                               |
|   License http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt            |
\ ======================================================================== */

class Module_Scorm extends LmsModule {

	//class constructor
	function Module_Scorm($module_name = '') {
		
		parent::LmsModule();
	}
	
	function loadBody() {
		
		include( Docebo::inc(_lms_.'/modules/scorm/scorm.php') );
	}
	
}
