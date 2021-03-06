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
			
// 			print_r($typenameplacevalue);
// 			echo '<br/>';
			if(isset($typenameplacevalue[3])){
				//print_r($typenameplacevalue[3]);
				//echo '<br/>';
				if(is_array($typenameplacevalue[3]) && ($typenameplacevalue[0] !='select' && $typenameplacevalue[0] != 'repeatable'))
				{
					$typenameplacevalue[3] = '';
				}
				//print_r($typenameplacevalue[3]);
				//echo '<br/>';
				$this->addInputObject($typenameplacevalue[0], $typenameplacevalue[1], $typenameplacevalue[2], $typenameplacevalue[3],false);
				
			}
			else {
				$this->addInputObject($typenameplacevalue[0], $typenameplacevalue[1], $typenameplacevalue[2], '', false);
			}
		}
		
		public function addInputObject($type,$name,$placeholder,$value,$repeatable) {
			switch ($type) {
				case 'varchar': $return_object = $this->addInput('text',$name,$placeholder,$value,$repeatable);
								break;
				case 'text':	$return_object = $this->addTextArea($name,$placeholder,$value,$repeatable);
								break;
				case 'select':  $return_object = $this->addSelectObject($name,$placeholder,$value,$repeatable);
								break;
				case 'email':
				case 'password': 
				case 'date':
				case 'number' :
				case 'datetime':
				case 'color': 	$return_object = $this->addInput($type,$name,$placeholder,$value,$repeatable);
								break;
				case 'icon': 	$return_object = $this->addIconObject($name,$placeholder,$value,$repeatable);
								break;
				case 'repeatable': $return_object = $this->addRepeatableObject($name,$placeholder,$value,$repeatable);
									break;
				default: echo 'Unknown Type ' . $type;
						break;
			}
			if($repeatable) {
				return $return_object;
			}
		}
		
		public function addSubmit($button) {
			$this->form_structure .= '<button class="btn btn-cv" type="submit" id="submit" name="submit">' . $button . '</button></form>';
		}
		
		public function renderForm() {
			return $this->form_structure;
		}
		
		protected function addInput($type,$name,$placeholder,$value,$repeatable) {
			$form_structure = '
					<div class="form-group">
    					<label for="' . $name . '">' . $placeholder . '</label>
						<input required class="form-control"  type="' . $type . '" name="' . $name . '" id="' . $name . '" placeholder="' . $placeholder. '" value="' . $value . '">
					</div>';
			if($repeatable) {
				return $form_structure;
			}
			else {
				$this->form_structure .= $form_structure;
				return true;
			}
		}
		
		protected function addTextArea($name,$placeholder,$value,$repeatable) {
			$form_structure = '<label for="' . $name . '">' . $placeholder . '</label>
					<textarea class="form-control" rows="3" name="' . $name . '" id="' . $name . '" placeholder="' . $placeholder. '" >' . $value . '</textarea>';
			if($repeatable) {
				return $form_structure;
			}
			else {
				$this->form_structure .= $form_structure;
				return true;
			}
		}
	
		protected function addSelectObject($name,$placeholder,$value,$repeatable) {
			$form_structure = '<label for="' . $name . '">' . $placeholder . '</label>
					<select required class="form-control" name="' . $name . '" id="' . $name . '">';
			$form_structure .= '<option value="" disabled selected>' . $placeholder . '</option>';
			foreach($value as $option_key => $option_value) {
				$form_structure .= '<option value="' . $option_key . '">' . $option_value . '</option>';
			}
			$form_structure .= '</select>';
			//echo $form_structure;
			if($repeatable) {
				return $form_structure;
			}
			else {
				$this->form_structure .= $form_structure;
				return true;
			}
		}
		
		protected function addIconObject($name,$placeholder,$value,$repeatable) {
			$form_structure = '<div class="form-group"><label for="' . $name . '">' . $placeholder . '</label>
								<div class="input-group">';
			$form_structure .= '<button class="btn btn-default iconpicker" data-iconset="fontawesome" data-icon="' . $value . '" name="' . $name . '" id="' . $name . '" role="iconpicker"></button></div></div>';
			$form_structure .= '<script>$(".iconpicker").iconpicker();</script>';
			//echo $form_structure;
			if($repeatable) {
				return $form_structure;
			}
			else {
				$this->form_structure .= $form_structure;
				return true;
			}
		}
		
		protected function addRepeatableObject($name,$placeholder,$value,$repeatable) {
			$form_structure = '<hr><div class="panel panel-primary"><div class="panel-heading">'.$placeholder.'</div>';
			$form_structure .= '<div class="repeatable-form panel-body" id="'.$name.'">';
			$repeat_form_structure = '';
			foreach ($value as $namet => $typevalue){
				if(is_array($typevalue[1])) {
					for ($k=0;$k<count($typevalue[1]);$k++){ 
						$repeat_form_structure .= $this->addInputObject($typevalue[0], $namet . '[]', underToUpper($namet), $typevalue[1][$k], true);
					}
				}
				else {
					$repeat_form_structure .= $this->addInputObject($typevalue[0], $namet . '[]', underToUpper($namet), $typevalue[1], true);
			
				}
			}
			$form_structure .= $repeat_form_structure;
			//$form_structure .= addInputObject($type,$name,$placeholder,$value,true);
			$form_structure .= '</div><div class="panel-footer"><a class="btn btn-success" id="add_field">Add Field</a><br/></div></div>';
			$form_structure .= '<script type="text/javascript">
								var counter =  0;
								var fields = $("#'.$name.'").html();
								$(function(){
								 $("#add_field").click(function(){
								 counter += 1;
								 $("#'.$name.'").append(fields);
								 });
								});
								</script>';
			if($repeatable) {
				return $form_structure;
			}
			else {
				$this->form_structure .= $form_structure;
				return true;	
			}
// 			echo $name . '<br/>'. $placeholder . '<br/>';
// 			print_r($value);
		}
		
	}
?>