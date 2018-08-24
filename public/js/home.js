"use strict";
function Products(){

}

Products.prototype.init = function () {
    var oTable = $('#data').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": $('#data_route').val(),
        "iDisplayLength": 20,
        "columns": [
            {data: 'title', name: 'title'},
            {data: 'image', name: 'image'},
            {data: 'description', name: 'description'},
            {data: 'first_invoice', name: 'first_invoice', "defaultContent" : 'Not Set'},
            {data: 'url', name: 'url'},
            {data: 'price', name: 'price'},
            {data: 'amount', name: 'amount'}
        ]
    });
};

Products.prototype.bindEvents = function () {

};

$(document).ready(function() {
    var products = new Products();
    products.init();
    products.bindEvents();
});