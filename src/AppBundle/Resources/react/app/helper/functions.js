import { infoWindow } from './../components/MapComponent';
export const RECEIVE_SEARCH = 'SEARCH_FORM_COMPONENT_ON_RECEIVE'

function receiveSearch(markers, total, message) {
    return {
        type: RECEIVE_SEARCH,
        message,
        markers: markers,
        total: total,
        receivedAt: Date.now()
    }
}
var w_window = $(window).width();

export function ellipsis(container) {
    $(container + ' .ellipsis-x-rows').each(function () {
        if (w_window > 1000 || !$(this).hasClass('ellipsis-not-responsive')) {
            $(this).dotdotdot();
        }
    });
}

export const searchSubmit = (values, dispatch) => {
    return new Promise((resolve, reject) => {
        if (infoWindow){
            infoWindow.close();
        }
        dispatch({type: 'SEARCH_FORM_COMPONENT_ON_SUBMIT', data: values});
        onSearchSubmit(values, dispatch, resolve, reject);
    });
};

export function onSearchSubmit(data, dispatch, resolve = null, reject = null) {
    $.ajax({
        url: "/app/search/"+data.type,
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        type: 'POST',
        data: JSON.stringify(data),
        success: function (data) {
            var i = 0;
            let markers = [];
            let elements = data.hits;
            elements.map(function (element) {
                if (element._source) {
                    i++;
                    let marker = element._source;
                    marker.id = element._id;
                    markers.push(marker);
                }
            });
            dispatch(receiveSearch(markers, data.total, 'SUCCESS'));
            if (resolve) {
                resolve();
            }
        }.bind(this),
        error: function (xhr, status, err) {
            if (reject) {
                reject({_error: err});
            } else {
                dispatch(receiveSearch([], err));
            }
        }.bind(this)
    });
}

export function isInArray(value, array) {
    if (array){
        return array.indexOf(value) > -1;
    }else {
        return false;
    }

}

export function deleteFromArray(value, array){
    var index = array.indexOf(value);
    if (index > -1) {
        array.splice(index, 1);
    }
}