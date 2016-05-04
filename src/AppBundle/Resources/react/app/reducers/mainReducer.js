const initialState =
{
        markers: []
};

const mainReducer = (state =initialState, action) => {
    let tempData = {};
    switch (action.type) {
        case 'SEARCH_MAP_COMPONENT_ON_CHANGE_PAGE':
            tempData = Object.assign({},state.data,{
                currentPage: action.data.currentPage,
                start: action.data.start
            });
            return Object.assign({}, state, {
                data: tempData
            });
        case 'SEARCH_MAP_COMPONENT_ON_CHANGE_ADDRESS':
            tempData = Object.assign({},state.data,{
                bounds: action.bounds,
                changedByForm: 1
            });
            return Object.assign({}, state, {
                data: tempData
            });
        case 'SEARCH_FORM_COMPONENT_ON_SUBMIT' :
            action.data.changedByForm  =1;
            action.data.needToUpdate = false;
            action.data.currentPage = 0;
            action.data.start = 0;
            return Object.assign({}, state, {
                data: Object.assign({},state.data,action.data)
            });
        case 'SEARCH_FORM_COMPONENT_ON_RECEIVE':
            tempData = Object.assign({},state.data,{
                needToUpdate: true,
                total : action.total
            });
            return Object.assign({}, state, {
                markers: action.markers,
                data: tempData
            });
        case 'SEARCH_FORM_COMPONENT_ON_RECEIVE_FAIL' :
            console.log(state.message);
            return state;
        case 'SEARCH_MAP_COMPONENT_ON_CHANGE':
            tempData = Object.assign({},state.data,{
                changedByForm: 0,
                needToUpdate: false,
                changedByAddress: false
            });
            // every time the submit occurred, we need to set it to false to accept the new map moving.
            return Object.assign({}, state, {
                data: tempData
            });
        case 'UPDATE_MAP_COMPONENT':
            return state;
        default:
            return state;
    }
};

export default mainReducer;