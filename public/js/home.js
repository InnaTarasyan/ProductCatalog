"use strict";
function Products(){

}

Products.prototype.init = function (category) {

    $('#data').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            url:  $('#data_route').val(),
            data: {
                category : category,
            },
        },
        "iDisplayLength": 20,
        "columns": [
            {data: 'title', name: 'title'},
            {data: 'image', name: 'image'},
            {data: 'description', name: 'description'},
            {data: 'first_invoice', name: 'first_invoice', "defaultContent" : 'Not Set'},
            {data: 'url', name: 'url'},
            {data: 'price', name: 'price'},
            {data: 'amount', name: 'amount'},
            {data: 'cat_title', name: 'cat_title'}
        ],
        "language": {
            "url":  "//cdn.datatables.net/plug-ins/1.10.19/i18n/Russian.json"
        }

    });
};

Products.prototype.bindEvents = function () {
    $(document).on('change', '#category', this.changeCategory.bind(this));
};

Products.prototype.changeCategory = function () {
    $('#data').DataTable().clear().destroy();
    this.init($( "#category option:selected" ).val());
};

$(document).ready(function() {
    var products = new Products();
    products.init();
    products.bindEvents();
});