/**
 * Created by rainx_000 on 05.11.2015.
 */
$(function(){
    objectView.init();
    fileUploader.init();
});
var objectView  = function(){};
objectView.settings = {
    'form'           : '.objectForm',
    'submit'         : '.objectFormSubmit',
    'errorContainer' : '.error',
    'successContainer' : '.success'
};

objectView.init = function () {
    objectView.formInit();

    return objectView;
};

objectView.formInit = function () {
    objectView.getFormSubmit().click(function(){
        var data = objectView.getForm().serialize();
        $.post(objectView.getForm().attr('action'), data, objectView.formCallback);
        return false;
    });
};

objectView.formCallback = function (response) {
    if ( typeof response === 'boolean' ) {
        objectView.successMessage('Объект успешно сохранен!');
    } else {
        objectView.errorMessage(response.error);
    }
};

objectView.successMessage = function(text){
    objectView.getSuccessContainer().text(text).fadeIn(400, function(){
        var that = this;
        setInterval(function(){ $(that).fadeOut(300) }, 8000);
    });
};

objectView.getSuccessContainer = function () {
    return $(objectView.settings.successContainer);
};

objectView.errorMessage = function(text){
    objectView.getErrorContainer().text(text).fadeIn(400, function(){
        var that = this;
        setInterval(function(){ $(that).fadeOut(300) }, 8000);
    });
};

objectView.getErrorContainer = function () {
    return $(objectView.settings.errorContainer);
};

objectView.getForm = function () {
    return $(objectView.settings.form);
};

objectView.getFormSubmit = function () {
    return $(objectView.settings.submit);
};

var fileUploader = function () {};

fileUploader.init = function () {
    var element$ = $('#browse');
    var uploader = new plupload.Uploader({
        browse_button: element$.get(0), // this can be an id of a DOM element or the DOM element itself
        url: element$.data('action')+'&_method=PUT',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    uploader.init();
    uploader.bind('FilesAdded', function(up, files) {
        var html = '';
        plupload.each(files, function(file) {
            html += '<span id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></span>';
        });
        document.getElementById('fileDetails').innerHTML += html;
        uploader.start();
    });
    uploader.bind('UploadProgress', function(up, file) {
        document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
    });
    uploader.bind('FileUploaded', function(up, file, response) {
        $('#avatar').attr('src', $.parseJSON(response.response).result.url);
        $(document.getElementById(file.id)).fadeOut();
    });
};
