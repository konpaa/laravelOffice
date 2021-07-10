require('./bootstrap');

const ujs = require('@rails/ujs');
ujs.start();

const $ = require('jquery');

global.$ = global.jQuery = $;

$.getJSON('/json',function (data) {
    $.each(data, function (key, value) {
        $(`#${value.department_id}${value.staff_id}`).append("<span class='mark'>&#10004</span>");
    })
});
