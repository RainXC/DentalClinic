'use strict';

var app = angular.module('test-app', ['ui.utils']);

app.controller('ctrlForm',function($scope, $http) {
    $scope.user = {};
    $scope.submit = function() {
        if ( $scope.form.$valid ) {
            $http.post( '/contacts/ajaxSendMessage/', $scope.user ).success(function( res ){
                if ( typeof res == 'boolean') {
                    $scope.user = {};
                    $scope.form.$setPristine();
                    $('.successMessage').fadeTo('fast', 1).delay(4000).fadeTo('fast', 0);
                } else {
                    alert( res.msg );
                }
            }).error(function(err){
                outError(err);
            });
        }
        return false;
    }
});

function outError(response) {
    $.each(response, function(key, value) {
        var label$ = $('label[for='+key+']');
        var input$ = $('[name='+key+']');
        var message$ = $('<span>');
        message$.text(value)
                .addClass('error')
                .css('display', 'none');

        label$.append(message$);
        message$.fadeIn();

        input$.blur(function(){
            message$.fadeOut(function(){
                $(this).remove();
            });
            $(this).parents('.form-group').removeClass('has-error');
        }).parents('.form-group').addClass('has-error');
    });
};

$(function(){

    //$('.contactsFormSubmit').click(function(){
    //    var form$    = $('.contactsForm');
    //    $.ajax({
    //        'url'      : form$.attr('action'),
    //        'data'     : form$.serialize(),
    //        'method'   : 'post',
    //        'dataType' : 'json',
    //        'error'  : function(response) {
    //            $.each(response.responseJSON, function(key, value) {
    //                var label$ = $('label[for='+key+']');
    //                var input$ = $('[name='+key+']');
    //                var message$ = $('<span>');
    //                message$.text(value)
    //                        .addClass('error')
    //                        .css('display', 'none');
    //
    //                label$.append(message$);
    //                message$.fadeIn();
    //
    //                input$.blur(function(){
    //                    message$.fadeOut(function(){
    //                        $(this).remove();
    //                    });
    //                    $(this).parents('.form-group').removeClass('has-error');
    //                }).parents('.form-group').addClass('has-error');
    //            });
    //        },
    //        'success' : function(response) {
    //            if ( typeof response === 'boolean') {
    //                $('.successMessage').fadeTo('fast', 1).delay(4000).fadeTo('fast', 0, function(){
    //                    form$.find('input:visible,textarea:visible').each(function(){
    //                        $(this).val('');
    //                    });
    //                });
    //            }
    //        }
    //
    //    });
    //
    //    return false;
    //});


    function initialize() {
        var myLatlng = new google.maps.LatLng(46.302763,28.658450);
        var mapOptions = {
            zoom: 16,
            center: myLatlng,
            scrollwheel: false,
            panControl: false,
            zoomControl: false,
            draggable: false,
            streetViewControl: false,
            scaleControl: false
        };
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'г. Комрат, ул. Победы 40'
        });

        $(window).resize(function(){
            map.setCenter( marker.getPosition() );
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
});