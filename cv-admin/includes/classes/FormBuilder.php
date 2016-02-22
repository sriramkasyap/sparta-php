<?php
	class FormBuilder {
		protected $form_action;
		protected $form_method;
		protected $form_enctype;
		//protected $validation;
		protected $form_structure;
		protected static $font_awesome = ['glass', 'music', 'search', 'envelope-o', 'heart', 'star', 'star-o', 'user', 'film', 'th-large', 'tha', 'th-listb', 'checkc', 'timesd', 'search-pluse', 'search-minus', 'power-off', 'signal', 'cog', 'trash-o', 'home', 'file-o', 'clock-o', 'road', 'download', 'arrow-circle-o-downa', 'arrow-circle-o-upb', 'inboxc', 'play-circle-od', 'repeate', 'refresh', 'list-alt', 'lock', 'flag', 'headphones', 'volume-off', 'volume-down', 'volume-up', 'qrcode', 'barcodea', 'tagb', 'tagsc', 'bookd', 'bookmarke', 'printf', 'camera', 'font', 'bold', 'italic', 'text-height', 'text-width', 'align-left', 'align-center', 'align-right', 'align-justify', 'lista', 'outdentb', 'indentc', 'video-camerad', 'picture-oe', 'pencil', 'map-marker', 'adjust', 'tint', 'pencil-square-o', 'share-square-o', 'check-square-o', 'arrows', 'step-backward', 'fast-backward', 'backwarda', 'playb', 'pausec', 'stopd', 'forwarde', 'fast-forward', 'step-forward', 'eject', 'chevron-left', 'chevron-right', 'plus-circle', 'minus-circle', 'times-circle', 'check-circle', 'question-circle', 'info-circlea', 'crosshairsb', 'times-circle-oc', 'check-circle-od', 'bane', 'arrow-left', 'arrow-right', 'arrow-up', 'arrow-down', 'share', 'expand', 'compress', 'plus', 'minus', 'asterisk', 'exclamation-circlea', 'giftb', 'leafc', 'fired', 'eyee', 'eye-slash', 'exclamation-triangle', 'plane', 'calendar', 'random', 'comment', 'magnet', 'chevron-up', 'chevron-down', 'retweet', 'shopping-carta', 'folderb', 'folder-openc', 'arrows-vd', 'arrows-he', 'bar-chart', 'twitter-square', 'facebook-square', 'camera-retro', 'key', 'cogs', 'comments', 'thumbs-o-up', 'thumbs-o-down', 'star-half', 'heart-oa', 'sign-outb', 'linkedin-squarec', 'thumb-tackd', 'external-linke', 'sign-in', 'trophy', 'github-square', 'upload', 'lemon-o', 'phone', 'square-o', 'bookmark-o', 'phone-square', 'twitter', 'facebooka', 'githubb', 'unlockc', 'credit-cardd', 'rsse', 'hdd-oa', 'bullhorna', 'bellf', 'certificatea', 'hand-o-righta', 'hand-o-lefta', 'hand-o-upa', 'hand-o-downa', 'arrow-circle-lefta', 'arrow-circle-righta', 'arrow-circle-upaa', 'arrow-circle-downab', 'globeac', 'wrenchad', 'tasksae', 'filterb', 'briefcaseb', 'arrows-altb', 'usersc', 'linkc', 'cloudc', 'flaskc', 'scissorsc', 'files-oc', 'paperclipc', 'floppy-oc', 'squarec', 'barsc', 'list-ulca', 'list-olcb', 'strikethroughcc', 'underlinecd', 'tablece', 'magicd', 'truckd', 'pinterestd', 'pinterest-squared', 'google-plus-squared', 'google-plusd', 'moneyd', 'caret-downd', 'caret-upd', 'caret-leftd', 'caret-rightda', 'columnsdb', 'sortdc', 'sort-descdd', 'sort-ascde', 'envelopee', 'linkedine', 'undoe', 'gavele', 'tachometere', 'comment-oe', 'comments-oe', 'bolte', 'sitemape', 'umbrellae', 'clipboardea', 'lightbulb-oeb', 'exchangeec', 'cloud-downloaded', 'cloud-uploadee', 'user-mdf', 'stethoscopef', 'suitcasef', 'bell-oa', 'coffeef', 'cutleryf', 'file-text-of', 'building-of', 'hospital-of', 'ambulancef', 'medkitfa', 'fighter-jetfb', 'beerfc', 'h-squarefd', 'plus-squarefe', 'angle-double-left', 'angle-double-right', 'angle-double-up', 'angle-double-down', 'angle-left', 'angle-right', 'angle-up', 'angle-down', 'desktop', 'laptop', 'tableta', 'mobileb', 'circle-oc', 'quote-leftd', 'quote-righte', 'spinner', 'circle', 'reply', 'github-alt', 'folder-o', 'folder-open-o', 'smile-o', 'frown-o', 'meh-oa', 'gamepadb', 'keyboard-oc', 'flag-od', 'flag-checkerede', 'terminal', 'code', 'reply-all', 'star-half-o', 'location-arrow', 'crop', 'code-fork', 'chain-broken', 'question', 'info', 'exclamationa', 'superscriptb', 'subscriptc', 'eraserd', 'puzzle-piecee', 'microphone', 'microphone-slash', 'shield', 'calendar-o', 'fire-extinguisher', 'rocket', 'maxcdn', 'chevron-circle-left', 'chevron-circle-right', 'chevron-circle-up', 'chevron-circle-downa', 'htmlb', 'cssc', 'anchord', 'unlock-alte', 'bullseye', 'ellipsis-h', 'ellipsis-v', 'rss-square', 'play-circle', 'ticket', 'minus-square', 'minus-square-o', 'level-up', 'level-down', 'check-squarea', 'pencil-squareb', 'external-link-squarec', 'share-squared', 'compasse', 'caret-square-o-down', 'caret-square-o-up', 'caret-square-o-right', 'eur', 'gbp', 'usd', 'inr', 'jpy', 'rub', 'krw', 'btca', 'fileb', 'file-textc', 'sort-alpha-ascd', 'sort-alpha-desce', 'sort-amount-asc', 'sort-amount-desc', 'sort-numeric-asc', 'sort-numeric-desc', 'thumbs-up', 'thumbs-down', 'youtube-square', 'youtube', 'xing', 'xing-square', 'youtube-playa', 'dropboxb', 'stack-overflowc', 'instagramd', 'flickre', 'adn', 'bitbucket', 'bitbucket-square', 'tumblr', 'tumblr-square', 'long-arrow-down', 'long-arrow-up', 'long-arrow-left', 'long-arrow-right', 'apple', 'windowsa', 'androidb', 'linuxc', 'dribbbled', 'skypee', 'foursquare', 'trello', 'female', 'male', 'gittip', 'sun-o', 'moon-o', 'archive', 'bug', 'vk', 'weiboa', 'renrenb', 'pagelinesc', 'stack-exchanged', 'arrow-circle-o-righte', 'arrow-circle-o-left', 'caret-square-o-left', 'dot-circle-o', 'wheelchair', 'vimeo-square', 'try', 'plus-square-o', 'space-shuttle', 'slack', 'envelope-square', 'wordpressa', 'openidb', 'universityc', 'graduation-capd', 'yahooe', 'googlea', 'reddita', 'reddit-squarea', 'stumbleupon-circlea', 'stumbleupona', 'deliciousa', 'digga', 'pied-pipera', 'pied-piper-alta', 'drupala', 'joomlaaa', 'languageab', 'faxac', 'buildingad', 'childae', 'pawb', 'spoonb', 'cubeb', 'cubesb', 'behanceb', 'behance-squareb', 'steamb', 'steam-squareb', 'recycleb', 'carb', 'taxiba', 'treebb', 'spotifybc', 'deviantartbd', 'soundcloudbe', 'databasec', 'file-pdf-oc', 'file-word-oc', 'file-excel-oc', 'file-powerpoint-oc', 'file-image-oc', 'file-archive-oc', 'file-audio-oc', 'file-video-oc', 'file-code-oc', 'vineca', 'codepencb', 'jsfiddlecc', 'life-ringcd', 'circle-o-notchce', 'rebeld', 'empired', 'git-squared', 'gitd', 'hacker-newsd', 'tencent-weibod', 'qqd', 'weixind', 'paper-planed', 'paper-plane-od', 'historyda', 'circle-thindb', 'headerdc', 'paragraphdd', 'slidersde', 'share-alte', 'share-alt-squaree', 'bombe', 'futbol-oe', 'ttye', 'binocularse', 'pluge', 'slidesharee', 'twitche', 'yelpe', 'newspaper-oea', 'wifieb', 'calculatorec', 'paypaled', 'google-walletee', 'cc-visaf', 'cc-mastercardf', 'cc-discoverf', 'cc-amexf', 'cc-paypalf', 'cc-stripef', 'bell-slashf', 'bell-slash-of', 'trashf', 'copyrightf', 'atfa', 'eyedropperfb', 'paint-brushfc', 'birthday-cakefd', 'area-chartfe', 'pie-chart', 'line-chart', 'lastfm', 'lastfm-square', 'toggle-off', 'toggle-on', 'bicycle', 'bus', 'ioxhost', 'angellist', 'cca', 'ilsb', 'meanpath'];
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
				case 'icon': 	$this->addIconObject($name,$placeholder,static::$font_awesome);
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
		
		protected function addIconObject($name,$placeholder,$fonta) {
			$form_structure = '<label for="' . $name . '">' . $placeholder . '</label>
					<select required class="form-control" name="' . $name . '" id="' . $name . '">';
			$form_structure .= '<option value="" disabled selected>' . $placeholder . '</option>';
			foreach($fonta as $icon) {
				$form_structure .= '<option value="' . $icon . '">' . iphenToUpper($icon) . '<i class="fa fa-' . $icon . '"></i></option>';
			}
			$form_structure .= '</select>';
			//echo $form_structure;
			$this->form_structure .= $form_structure;
			echo '<i class="icon-home"></i>';
		}
		
		
	}
?>