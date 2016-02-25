<?php
	class FormBuilder {
		protected $form_action;
		protected $form_method;
		protected $form_enctype;
		//protected $validation;
		protected $form_structure;
		public function __construct($actionmethodenctype){
			if(isset($actionmethodenctype[0])){
				$this->form_action = $actionmethodenctype[0];
			} else {
				$this->form_action = '';
			}
			if(isset($actionmethodenctype[1])){
				$this->form_method = $actionmethodenctype[1];
			} else {
				$this->form_method = 'post';
			}
			if(isset($actionmethodenctype[2])){
				$this->form_enctype = $actionmethodenctype[2];
			} else {
				$this->form_enctype = '';
			}
			$this->addForm();
		}
		
		private function addForm() {
			$this->form_structure = '<form id="idform" action="' . $this->form_action . '" method="' . $this->form_method . '" enctype="' . $this->form_enctype . '">';
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
				case 'varchar': $this->addInput('text',$name,$placeholder,$value);
								break;
				case 'text':	$this->addTextArea($name,$placeholder,$value);
								break;
				case 'select':  $this->addSelectObject($name,$placeholder,$value);
								break;
				case 'email':
				case 'password': 
				case 'date':
				case 'number' :
				case 'datetime':
				case 'color': 	$this->addInput($type,$name,$placeholder,$value);
								break;
				case 'icon': 	$this->addIconObject($name,$placeholder,$value);
								break;
				default: echo 'Unknown Type';
						break;
			}
		}
		
		public function addSubmit($button) {
			$this->form_structure .= '<button class="btn btn-cv" type="submit" id="submit" name="submit">' . $button . '</button></form>';
		}
		
		public function renderForm() {
			return $this->form_structure;
		}
		
		protected function addInput($type,$name,$placeholder,$value) {
			$this->form_structure .= '
					<div class="form-group">
    					<label for="' . $name . '">' . $placeholder . '</label>
						<input required class="form-control"  type="' . $type . '" name="' . $name . '" id="' . $name . '" placeholder="' . $placeholder. '" value="' . $value . '">
					</div>';
		}
		
		protected function addTextArea($name,$placeholder,$value) {
			$this->form_structure .= '<label for="' . $name . '">' . $placeholder . '</label>
					<textarea class="form-control" rows="3" name="' . $name . '" id="' . $name . '" placeholder="' . $placeholder. '" >' . $value . '</textarea>';
		}
	
		protected function addSelectObject($name,$placeholder,$value) {
			$form_structure = '<label for="' . $name . '">' . $placeholder . '</label>
					<select required class="form-control" name="' . $name . '" id="' . $name . '">';
			$form_structure .= '<option value="" disabled selected>' . $placeholder . '</option>';
			foreach($value as $option_key => $option_value) {
				$form_structure .= '<option value="' . $option_key . '">' . $option_value . '</option>';
			}
			$form_structure .= '</select>';
			//echo $form_structure;
			$this->form_structure .= $form_structure;
		}
		
		protected function addIconObject($name,$placeholder,$value) {
			$form_structure = '<div class="form-group"><label for="' . $name . '">' . $placeholder . '</label>
					<div class="input-group">';
			$form_structure .= '<button class="btn btn-default iconpicker" data-iconset="fontawesome" data-icon="' . $value . '" name="' . $name . '" id="' . $name . '" role="iconpicker"></button></div></div>';
			$form_structure .= '<script>$(".iconpicker").iconpicker();</script>';
			//echo $form_structure;
			$this->form_structure .= $form_structure;
			//echo '<i class="icon-home"></i>';
		}
		
		
	}
?>