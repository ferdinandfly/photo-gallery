const initialState =
{
        categories: []
};
const mainReducer = (state=initialState, action) => {
    switch (action.type) {
        case 'RECEIVE_CATEGORIES':
            return Object.assign({}, state, {
                categories: action.categories
            });
            break;
        case 'RECEIVE_MEDIAS':
            return Object.assign({}, state, {
                medias: action.medias,
                category: action.category
            });
            break;
        case 'GET_ERROR':
            return state;
            break;
        default:
            return state;
    }
};

export default mainReducer;