<?php
	class FormBuilder {
		protected $form_action;
		protected $form_method;
		protected $form_enctype;
		//protected $validation;
		protected $form_structure;
		public function __construct($action,$method,$enctype){
			$this->form_method = $method;
			if(!empty($action)) {
				$this->form_action = $action;
			} else {
				$this->form_action = $_SERVER['PHP_SELF'];
			}
			
			if(!empty($enctype)) {
				$this->form_enctype = $enctype;
			} else {
				$this->form_enctype = '';
			}
			$this->addForm();
		}
		
		private function addForm() {
			$this->form_structure = '<form action="' . $this->form_action . '" method="' . $this->form_method . '" enctype="' . $this->form_enctype . '">';
		}
		
		public function addObject($typenameplacevalue){
			if(isset($typenameplacevalue[3])){
				$this->addInputObject($typenameplacevalue[0], $typenameplacevalue[1], $typenameplacevalue[2], $typenameplacevalue[3]);
			}
			else {
				$this->addInputObject($typenameplacevalue[0], $typenameplacevalue[1], $typenameplacevalue[2], '');
			}
		}
		
		protected function addInputObject($type,$name,$placeholder,$value) {
			switch ($type) {
				case 'varchar': $this->addTextInput($name,$placeholder,$value);
								break;
				case 'text':	$this->addTextArea($name,$placeholder,$value);
								break;
			}
		}
		
		public function addSubmit($button) {
			$this->form_structure .= '<button type="submit" id="submit" name="submit">' . $button . '</button></form>';
		}
		
		public function renderForm() {
			return $this->form_structure;
		}
		
		protected function addTextInput($name,$placeholder,$value) {
			$this->form_structure .= '<input type="text" name="' . $name . '" id="' . $name . '" placeholder="' . $placeholder. '" value="' . $value . '">';
		}
	}
?>