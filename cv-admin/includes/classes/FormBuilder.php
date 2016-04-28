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
				$this->form_enctype = ' enctype="' . $actionmethodenctype[2] . '" ';
			} else {
				$this->form_enctype = '';
			}
			$this->addForm();
		}
		
		private function addForm() {
			$this->form_structure = '<form id="new_snip_form" action="' . $this->form_action . '" method="' . $this->form_method .'"'. $this->form_enctype . '>';
		}
		
		public function addObject($typenameplacevalue, $mandatory){
			
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
				$this->addInputObject($typenameplacevalue[0], $typenameplacevalue[1], $typenameplacevalue[2], $typenameplacevalue[3],false, $mandatory);
				
			}
			else {
				$this->addInputObject($typenameplacevalue[0], $typenameplacevalue[1], $typenameplacevalue[2], '', false, $mandatory);
			}
		}
		
		protected  function addInputObject($type,$name,$placeholder,$value,$repeatable, $mandatory) {
			switch ($type) {
				case 'varchar': $return_object = $this->addInput('text',$name,$placeholder,$value,$repeatable, $mandatory);
								break;
				case 'text':	$return_object = $this->addTextArea($name,$placeholder,$value,$repeatable, $mandatory);
								break;
				case 'select':  $return_object = $this->addSelectObject($name,$placeholder,$value,$repeatable, $mandatory);
								break;
				case 'image':  $return_object = $this->addImageObject($name,$placeholder,$value,$repeatable, $mandatory);
								break;
				case 'email':
				case 'password': 
				case 'date':
                case 'tel':
				case 'number' :
				case 'hidden' :
				case 'datetime':
				case 'color': 	$return_object = $this->addInput($type,$name,$placeholder,$value,$repeatable, $mandatory);
								break;
				case 'icon': 	$return_object = $this->addIconObject($name,$placeholder,$value,$repeatable, $mandatory);
								break;
				case 'repeatable': $return_object = $this->addRepeatableObject($name,$placeholder,$value,$repeatable, $mandatory);
									break;
				case 'bool' :
				case 'checkbox' : $return_object = $this->addCheckBoxObject($name,$placeholder,$value,$repeatable, $mandatory);
									break;
				case 'url' : $return_object = $this->addURL($name, $placeholder, $value, $repeatable, $mandatory);
							break;
				
				default: echo 'Unknown Type ' . $type;
						break;
			}
			if($repeatable) {
				return $return_object;
			}
		}
		
		public function addSubmit($button) {
			$this->form_structure .= '<div class="form-group">
										<button class="btn btn-cv" type="submit" id="submit" name="submit">' . $button . '</button>
									</div></form>';
		}
		
		public function renderForm() {
			$form_structure = '<script>
									
										function remove_input(button) {
											$(button).parents(".form-group").remove();
										}
						$(function () {
						    $(".button-checkbox").each(function () {
						
						        // Settings
						        var $widget = $(this),
						            $button = $widget.find("button"),
						            $checkbox = $widget.find("input:checkbox"),
						            color = $button.data("color"),
						            settings = {
						                on: {
						                    icon: "glyphicon glyphicon-check"
						                },
						                off: {
						                    icon: "glyphicon glyphicon-unchecked"
						                }
						            };
						
						        // Event Handlers
						        $button.on("click", function () {
						            $checkbox.prop("checked", !$checkbox.is(":checked"));
						            $checkbox.triggerHandler("change");
						            updateDisplay();
						        });
						        $checkbox.on("change", function () {
						            updateDisplay();
						        });
						
						        // Actions
						        function updateDisplay() {
						            var isChecked = $checkbox.is(":checked");
						
						            // Set the button"s state
						            $button.data("state", (isChecked) ? "on" : "off");
						
						            // Set the button"s icon
						            $button.find(".state-icon")
						                .removeClass()
						                .addClass("state-icon " + settings[$button.data("state")].icon);
						
						            // Update the button"s color
						            if (isChecked) {
						                $button
						                    .removeClass("btn-default")
						                    .addClass("btn-" + color + " active");
						            }
						            else {
						                $button
						                    .removeClass("btn-" + color + " active")
						                    .addClass("btn-default");
						            }
						        }
						
						        // Initialization
						        function init() {
						
						            updateDisplay();
						
						            // Inject the icon if applicable
						            if ($button.find(".state-icon").length == 0) {
						                $button.prepend("<i class=\'state-icon " + settings[$button.data("state")].icon + "\'></i>");
						            }
						        }
						        init();
						    });
						});
					</script>';
			$form_structure .= $this->form_structure;
			$this->form_structure = $form_structure;
			return stripslashes($this->form_structure);
		}
		
		protected function addInput($type,$name,$placeholder,$value,$repeatable, $mandatory) {
			$form_structure = '
					<div class="form-group">
    					<label for="' . $name . '">' . $placeholder . '</label>
    					<div class="input-group">
							<input required class="form-control"  type="' . $type . '" name="' . $name . '" id="' . $name . '" placeholder="' . $placeholder. '" value="' . $value . '">';
			if(!$mandatory) {
				$form_structure .= '<div class="input-group-btn">
					                   	<button class="remove_input btn btn-danger" onclick="remove_input(this)"  title="Remove Field"  type="button"><span class="glyphicon glyphicon-remove"></span></button>
					            	</div> ';
			}
			
			$form_structure .= '</div></div>';
			if($repeatable) {
				return $form_structure;
			}
			else {
				$this->form_structure .= $form_structure;
				return true;
			}
		}
		
		protected function addURL($name,$placeholder,$value,$repeatable, $mandatory) {
			$form_structure = '
					<div class="form-group">
    					<label for="' . $name . '">' . $placeholder . '</label>
    					<div class="input-group">
    						
    						<select required class="form-control url-selector" name="' . $name . '" id="' . $name . '" placeholder="' . $placeholder. '" value="' . $value . '">
    							<option disbaled selected>Select an Internal Page to link</option>
    							<option value="ext">Enter External Link Address</option>';
			

			$page_urls = mysqli_query(connect_db(),"SELECT `page_url`,`page_title` FROM `".TABLE_PREFIX."pages`");
				
			while($row_urls = mysqli_fetch_assoc($page_urls)) {
				$form_structure .='<option '. ((isset($value) && ($value==$row_urls['page_url'])) ? 'selected' : '') . ' value="'. trim($row_urls['page_url'],'/') .'">'. $row_urls['page_title'] .'</option>';
			}
			$form_structure .= '</select><input type="hidden" required class="form-control" id="hid-'.$name.'" placeholder="' . $placeholder. '" value="' . $value . '"/>';
			if(!$mandatory) {
				$form_structure .= '<div class="input-group-btn">
					                   	<button class="remove_input btn btn-danger" onclick="remove_input(this)"  title="Remove Field"  type="button"><span class="glyphicon glyphicon-remove"></span></button>
					            	</div> ';
			}
			
			$form_structure .= '</div></div>
					<script>
						$("#hid-'.$name.'").hide();
						$(".url-selector#'.$name.'").change(function() {
							var selected_option = $(".url-selector#'.$name.' option:selected").attr("value");
							//alert(selected_option);
							if(selected_option == "ext") {
								$("#hid-'.$name.'").show();
								$("#hid-'.$name.'").attr("type","text");
								$("#hid-'.$name.'").attr("name","'.$name.'");
								$(this).removeAttr("name");
										
							}
							else {
								$(this).attr("name","'.$name.'");
								$("#hid-'.$name.'").attr("type","hidden");
								$("#hid-'.$name.'").removeAttr("name");
							}
						});
					</script>';
			if($repeatable) {
				return $form_structure;
			}
			else {
				$this->form_structure .= $form_structure;
				return true;
			}
		}
				
		protected function addCheckBoxObject($name,$placeholder,$value,$repeatable, $mandatory) {
			$form_structure = '
					<div class="form-group">
    					<label for="' . $name . '">' . $placeholder . '</label>
    					<div class="input-group">
    							<span class="button-checkbox">
							        <button type="button" class="btn" data-color="primary"> ' . $placeholder . ' </button>
							        <input name="' . $name . '" id="' . $name . '" type="checkbox" '.($value ? 'checked' : '').' class="hidden" />
							    </span>';
							
			if(!$mandatory) {
				$form_structure .= '<div class="input-group-btn">
					                   	<button class="remove_input btn btn-danger" onclick="remove_input(this)"  title="Remove Field"  type="button"><span class="glyphicon glyphicon-remove"></span></button>
					            	</div> ';
			}
				
			$form_structure .= '</div></div>';
			if($repeatable) {
				return $form_structure;
			}
			else {
				$this->form_structure .= $form_structure;
				return true;
			}
		}
		
		protected function addTextArea($name,$placeholder,$value,$repeatable, $mandatory) {
			$form_structure = '<div class="form-group"><label for="' . $name . '">' . $placeholder . '</label>
					<div class="input-group">
					<textarea class="form-control ckeditor" rows="3" name="' . $name . '" id="' . $name . '" placeholder="' . $placeholder. '" >' . $value . '</textarea>';
			if(!$mandatory) {
				$form_structure .= '<div class="input-group-btn">
			                   	<button class="remove_input btn btn-danger" onclick="remove_input(this)"  title="Remove Field"  type="button"><span class="glyphicon glyphicon-remove"></span></button>
			            	</div>';
			}
			$form_structure .='</div>';
			if(!$repeatable){
					$form_structure .= '<script>
		               	var editor = CKEDITOR.replace("'.$name.'");
						editor.on( \'change\', function( evt ) {
		               		CKEDITOR.instances.'.$name.'.updateElement();
		               	});
		            </script>';
			}
			$form_structure .= '</div>';
			if($repeatable) {
				return $form_structure;
			}
			else {
				$this->form_structure .= $form_structure;
				return true;
			}
		}
	
		protected function addSelectObject($name,$placeholder,$value,$repeatable, $mandatory) {
			$form_structure = '<div class="form-group"><label for="' . $name . '">' . $placeholder . '</label>
					<div class="input-group">
						<select required class="form-control" name="' . $name . '" id="' . $name . '">';
			$form_structure .= '<option value="" disabled selected>' . $placeholder . '</option>';
			foreach($value as $option_key => $option_value) {
				$form_structure .= '<option value="' . $option_key . '">' . $option_value . '</option>';
			}
			$form_structure .= '</select>';
			if(!$mandatory) {
				$form_structure .= '<div class="input-group-btn">
					                   	<button class="remove_input btn btn-danger" onclick="remove_input(this)"  title="Remove Field"  type="button"><span class="glyphicon glyphicon-remove"></span></button>
					            	</div>';
			}
			$form_structure .= '</div></div>';
			//echo $form_structure;
			if($repeatable) {
				return $form_structure;
			}
			else {
				$this->form_structure .= $form_structure;
				return true;
			}
		}
		
		protected function addIconObject($name,$placeholder,$value,$repeatable, $mandatory) {
			$form_structure = '<div class="form-group"><label for="' . $name . '">' . $placeholder . '</label>
								<div class="input-group">';
			$form_structure .= '<button class="btn btn-default iconpicker" data-iconset="fontawesome" data-icon="' . $value . '" name="' . $name . '" id="' . $name . '" role="iconpicker"></button>';
			if(!$mandatory) {
				$form_structure .= '<div class="input-group-btn">
			                   	<button class="remove_input btn btn-danger" onclick="remove_input(this)"  title="Remove Field"  type="button"><span class="glyphicon glyphicon-remove"></span></button>
			            	</div>';
			}
			$form_structure .='</div></div>
								<script>$(".iconpicker").iconpicker();</script>';
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
						$repeat_form_structure .= $this->addInputObject($typevalue[0], $namet . '[]', underToUpper($namet), $typevalue[1][$k], true,false);
					}
				}
				else {
					$repeat_form_structure .= $this->addInputObject($typevalue[0], $namet . '[]', underToUpper($namet), $typevalue[1], true,false);
			
				}
			}
			$form_structure .= $repeat_form_structure;
			//$form_structure .= addInputObject($type,$name,$placeholder,$value,true);
			$form_structure .= '<hr></div><div class="panel-footer"><a class="btn btn-success" id="add_field">Add Field</a><br/></div></div>';
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
		
		protected function addImageObject($name,$placeholder,$value,$repeatable, $mandatory) {
// 			$form_structure = ' <div class="form-group"><div class="input-group image-preview">
// 					                <input type="text" class="form-control image-preview-filename" disabled="disabled">
// 					                <span class="input-group-btn">
// 					                    <!-- image-preview-clear button -->
// 					                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
// 					                        <span class="glyphicon glyphicon-remove"></span> Clear
// 					                    </button>
// 					                    <!-- image-preview-input -->
// 					                    <div class="btn btn-default image-preview-input">
// 					                        <span class="glyphicon glyphicon-folder-open"></span>
// 					                        <span class="image-preview-input-title">Browse</span>
// 					                        <input type="file" accept="image/png, image/jpeg, image/gif" id="'.$name.'" name="'.$name.'"/>
// 					                    </div>
// 					                </span>
// 					            </div></div>';
// 			$form_structure .= '<script>
// 									$(document).on(\'click\', \'#close-preview\', function(){ 
// 								    $(\'.image-preview\').popover(\'hide\');
// 								    // Hover befor close the preview
// 								    $(\'.image-preview\').hover(
// 								        function () {
// 								           $(\'.image-preview\').popover(\'show\');
// 								        }, 
// 								         function () {
// 								           $(\'.image-preview\').popover(\'hide\');
// 								        }
// 								    );    
// 								});
								
// 								$(function() {
// 								    // Create the close button
// 								    var closebtn = $(\'<button/>\', {
// 								        type:"button",
// 								        text: \'x\',
// 								        id: "close-preview",
// 								        style: "font-size: initial;",
// 								    });
// 								    closebtn.attr("class","close pull-right");
// 								    // Set the popover default content
// 								    $(".image-preview").popover({
// 								        trigger:"manual",
// 								        html:true,
// 								        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
// 								        content: "There\'s no image",
// 								        placement:"bottom"
// 								    });
// 								    // Clear event
// 								    $(".image-preview-clear").click(function(){
// 								        $(\'.image-preview\').attr("data-content","").popover(\'hide\');
// 								        $(\'.image-preview-filename\').val("");
// 								        $(\'.image-preview-clear\').hide();
// 								        $(\'.image-preview-input input:file\').val("");
// 								        $(".image-preview-input-title").text("Browse"); 
// 								    }); 
// 								    // Create the preview image
// 								    $(".image-preview-input input#'.$name.'").change(function (){     
// 								        var img = $(\'<img/>\', {
// 								            id: "dynamic",
// 								            width:250,
// 								            height:200
// 								        });      
// 								        var file = this.files[0];
// 								        var reader = new FileReader();
// 								        // Set preview image into the popover data-content
// 								        reader.onload = function (e) {
// 								            $(".image-preview-input-title").text("Change");
// 								            $(".image-preview-clear").show();
// 								            $(".image-preview-filename").val(file.name);            
// 								            img.attr("src", e.target.result);
// 								            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
// 								        }        
// 								        reader.readAsDataURL(file);
// 								    });  
// 								});
// 								</script>';
			$form_structure = '<div class="form-group">
								    <label for="'.$name.'">'.$placeholder.'</label>
								    		<div class="input-group">
								    <input type="file" id="'.$name.'" name="'.$name.'">';
			if(!$mandatory) {
				$form_structure .= '<div class="input-group-btn">
			                   	<button class="remove_input btn btn-danger" onclick="remove_input(this)"  title="Remove Field"  type="button"><span class="glyphicon glyphicon-remove"></span></button>
			            	</div>';
			}
			$form_structure .='</div>
								 </div>';
			if($repeatable) {
				return $form_structure;
			}
			else {
				$this->form_structure .= $form_structure;
				return true;
			}
		}
	}
?>