var data = {
    "jgADDclose": parent.tinyMCE.util.I18n.translate('Insert and Close'),
    "jgADD": parent.tinyMCE.util.I18n.translate('Insert'),
};
function justgivinginit() {
    $(function() {
        $('#justgiving-type').change(function() {
            //console.log('#jg'+$('#justgiving-type option:selected').val());
            $('#jg'+$('#justgiving-type option:selected').val()).show();   
            $('#jgtype').hide();            
            $('.choice.submit').show();            
        });
    });
}
;
function I_Close() {
    parent.tinyMCE.activeEditor.windowManager.close();
}
function I_Insert() {
    //$('#jgtype').show();
    var shortcode = '[jg-' + $('#justgiving-type option:selected').val();
    $('#jg'+$('#justgiving-type option:selected').val()+' :input').each(function(){
        var valv = $(this).val();
        var showm = false;
        //console.log($(this).attr('type') + ' ' + Number.isInteger(parseInt(valv)) );
        if ($(this).attr('type') == 'checkbox'){
            valv = 'false';
            if ($(this).checked) valv = 'true';
            showm = true;
        }        
        else if ($(this).attr('type') == 'text'){
            if (valv.length > 0) showm = true;
            valv = "'"+valv+"'";
        }
        else if ($(this).attr('type') == 'number' && Number.isInteger(parseInt(valv)) && valv > 0){
            console.log('num a');        
            showm = true;
        }
        else if ($(this).attr('type') == 'number' && !Number.isInteger(parseInt(valv))){
            console.log('num b');        
            showm = false;
        }        
        else if ($(this).is("select")){
            if (valv.length > 0) showm = true;
            valv = "'"+valv+"'";
        }        
        else showm = true;
        if (showm) shortcode += ' ' + $(this).attr('name')+'='+valv; // This is the jquery object of the input, do what you will
    });
    shortcode += ']';
    parent.tinyMCE.activeEditor.setContent(parent.tinyMCE.activeEditor.getContent() + shortcode);
}

$.get('forma.html', function(template) {
    filled = Mustache.render(template, data);
    $('#template-container').append(filled);
    $('#template-container .choice').hide();
    justgivinginit();
});