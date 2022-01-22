jQuery(document).ready(function($){
	let updateCSS = function(){
    $("#fivestarclean_admin_custom_css").val( editor.getSession().getValue() );
  }
	$("#save-custom-css-form").submit( updateCSS );
});

ace.require("ace/ext/language_tools");

let editor = ace.edit("fivestarclean-custom-css-wrapper");
editor.setTheme("ace/theme/dracula");
editor.session.setMode("ace/mode/css");
editor.session.setTabSize(2);
editor.setOptions({
  enableBasicAutocompletion: true,
  enableSnippets: true,
  enableLiveAutocompletion: true
});

document.getElementById('fivestarclean-custom-css-wrapper').style.fontSize='16px';

