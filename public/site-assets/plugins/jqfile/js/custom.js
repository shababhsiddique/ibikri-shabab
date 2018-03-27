/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {
    
    var remlink = $("#fileupload").data('removelink');
    var handler = $("#fileupload").data('handler');
    
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = handler;//'http://localhost/jqf/server/php/';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 999000,
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
                .test(window.navigator.userAgent),
        previewMaxWidth: 60,
        previewMaxHeight: 60,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {

        data.context = $('<div/>').appendTo('#files');
        $.each(data.files, function (index, file) {
            var node = $('<span/>');
            node.appendTo(data.context);
        });
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
                file = data.files[index],
                node = $(data.context.children()[index]);
        if (file.preview) {
            node
                    .prepend('<br>')
                    .prepend(file.preview);
        }
        if (file.error) {
            node
                    .append('<br>')
                    .append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('button')
                    .text('Upload')
                    .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
                'width',
                progress + '%'
                );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            if (file.url) {
                //Add record on form
//                var fileHist = $("#post_images_uploaded").val();
//                $("#post_images_uploaded").val(fileHist+","+file.name);
                var link = $('<a class="image-remove-link">')
                        .attr('target', '_blank')
                        .prop('href', remlink+"/"+file.name);
                $(data.context.children()[index])
                        .wrap(link);
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                        .append('<br>')
                        .append(error);
            }
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index) {
            var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
        });
    }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    
    
    $("#files").on("click","a.image-remove-link",function(e){
        e.preventDefault();
        console.log($(this).attr("href"));
        console.log('I got it');
    });
});

