<?php
	class FormBuilder {
		protected $meta_array;
		protected $form_action;
		protected $form_method;
		protected $form_enctype;
		protected $validation;
		protected $form_structure;
		public function __construct(){
			$a = func_get_args();
			$i = func_num_args();
			if (method_exists($this,$f='__construct'.$i)) {
				call_user_func_array(array($this,$f),$a);
			}
		}
		public function __construct1($action,$method,$array){
			$this->form_action = $action;
			$this->form_method = $method;
			$this->meta_array = $array;
			$this->form_enctype = 'text/plain';
			$this->addForm();
		}
		public function __construct2($action,$method,$array,$enctype){
			$this->form_action = $action;
			$this->form_method = $method;
			$this->meta_array = $array;
			$this->form_enctype = $enctype;
			$this->addForm();
		}
		private function addForm() {
			$this->form_structure = '<form action="' . $this->form_action . '" method="' . $this->form_method . '" enctype="' . $this->form_enctype . '">';
		}
		public function addObject($type,$name) {
			$this->form_structure .= '';
		}
		public function renderForm() {
			return $this->form_structure;
		}
	}
?>