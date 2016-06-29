import { URL_CATEGORY } from './config';

export function getCategories(dispatch) {
    $.ajax({
        url: URL_CATEGORY,
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        type: 'GET',
        success: function (results) {
            dispatch({'type': 'RECEIVE_CATEGORIES','categories': results});
        }.bind(this),
        error: function (xhr, status, err) {
            dispatch({'type': 'GET_ERROR','message': err});
        }.bind(this)
    });
}

export function getMedias(dispatch,category){
    $.ajax({
        url: URL_CATEGORY+"/"+category,
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        type: 'GET',
        success: function (results) {
            dispatch({'type': 'RECEIVE_MEDIAS','medias': results, 'category': category});
        }.bind(this),
        error: function (xhr, status, err) {
            dispatch({'type': 'GET_ERROR','message': err});
        }.bind(this)
    });
}