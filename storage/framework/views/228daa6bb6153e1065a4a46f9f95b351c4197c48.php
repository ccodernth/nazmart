/*-----------------------------------
*           RANGE SCRIPT
* ---------------------------------*/
$(document).on('change','.page-builder-area-wrapper input[type="range"]',function (e){
e.preventDefault();
var el = $(this);
el.next('.range-val').text(el.val()+el.data('unit-type'));
});


/*-----------------------------------
*  COLOR Picker INIT FUnction
* ---------------------------------*/

function colorPickerInit(selector){

$.each(selector,function (index,value){
var el = $(this);
el.spectrum({
showAlpha: true,
showPalette: true,
cancelText : '',
showInput: true,
allowEmpty:true,
chooseText : '',
maxSelectionSize: 2,
color: el.next('input').val(),
change: function(color) {
el.next('input').val( color ? color.toRgbString() : '');
el.css({
'background-color' : color ? color.toRgbString() : ''
});
},
move: function(color) {
el.next('input').val( color ? color.toRgbString() : '');
el.css({
'background-color' : color ? color.toRgbString() : ''
});
},
});

el.on("dragstop.spectrum", function(e, color) {
el.next('input').val( color.toRgbString());
el.css({
'background-color' : color.toHexString()
});
});
});
}

/*------------------------------------------
*   ICON PICKET INIT
* ----------------------------------------*/
$('.icp-dd').iconpicker();
$('body').on('iconpickerSelected','.icp-dd', function (e) {
var selectedIcon = e.iconpickerValue;
$(this).parent().parent().children('input').val(selectedIcon);
$('body .dropdown-menu.iconpicker-container').removeClass('show');
});

/*-------------------------------------------
*   REPEATER SCRIPT
* ------------------------------------------*/
$(document).on('click','.all-field-wrap .action-wrap .add',function (e){
e.preventDefault();

var el = $(this);
var parent = el.parent().parent();
var container = $('.all-field-wrap');
var clonedData = parent.clone();
var containerLength = container.length;
clonedData.find('#myTab').attr('id','mytab_'+containerLength);
clonedData.find('#myTabContent').attr('id','myTabContent_'+containerLength);
var allTab =  clonedData.find('.tab-pane');
allTab.each(function (index,value){
var el = $(this);
var oldId = el.attr('id');
el.attr('id',oldId+containerLength);
});
var allTabNav =  clonedData.find('.nav-link');
allTabNav.each(function (index,value){
var el = $(this);
var oldId = el.attr('href');
el.attr('href',oldId+containerLength);
});
clonedData.find('.iconpicker-popover').remove();
parent.parent().append(clonedData);

if (containerLength > 0){
parent.parent().find('.remove').show(300);
}
// parent.parent().find('.iconpicker-popover').remove();
parent.parent().find('.icp-dd').iconpicker('destroy');
parent.parent().find('.icp-dd').iconpicker();

});

$(document).on('click','.all-field-wrap .action-wrap .remove',function (e){
e.preventDefault();
var el = $(this);
var parent = el.parent().parent();
var container = $('.all-field-wrap');

if (container.length > 1){
el.show(300);
parent.hide(300);
parent.remove();
}else{
el.hide(300);
}
});

function strRand(length) {
var result           = '';
var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
var charactersLength = characters.length;
for ( var i = 0; i < length; i++ ) {
result += characters.charAt(Math.floor(Math.random() *
charactersLength));
}
return result;
}
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/components/helperjs.blade.php ENDPATH**/ ?>