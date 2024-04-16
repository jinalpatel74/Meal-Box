function get_count(from, to) {
    api_calling = true;
    var areas = $('#area-select').val();
    if (from) {
        var data = {
            'from': from,
            'to': to,
            AreaId: areas
        };
    } else {
        var data = {
            AreaId: areas
        };
    }

    $.ajax({
        url: '{{ URL::to("/admin/order_by_date") }}',
        method: 'GET',
        data: data,
        success: function(response) {
            response=JSON.parse(response);
            if(response.data.orderNumber){
                $('#total_count').html((response.data.orderNumber).toLocaleString());
            }
            if(response.data.currentNumber){
                $('#current_count').html((response.data.currentNumber).toLocaleString());
            }
            if(response.data.pending){
                $('#pending_count').html((response.data.pending).toLocaleString());
            }

        },
        error: function(response) {
            api_calling = false;
        }
    });

}