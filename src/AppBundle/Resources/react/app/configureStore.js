import { createStore, combineReducers, applyMiddleware } from 'redux'
import {reducer as formReducer} from 'redux-form';
import thunkMiddleware from 'redux-thunk'
import createLogger from 'redux-logger'
import mainReducer from './reducers/mainReducer'

const reducer = combineReducers({
    main: mainReducer,
    form: formReducer
});

export default function configureStore() {
    var dataContainer =  $("#data_container");
    let types =dataContainer.data('types');
    let classLevels = dataContainer.data('classlevels');
    let sectors = dataContainer.data('sectors');
    let type = dataContainer.data('type');
    const initialState =
    {
        map: {
            markers: [],
            data: { type: type, start : 0, total: 0, perPage: 10, currentPage :0, needToUpdate: false, changedByForm: 1,
                bounds: null,
                keywords: "",
                instituteType: [] },
            types: types,
            classLevels: classLevels,
            sectors: sectors
        }
    };
    return createStore(
        reducer,
        initialState,
        //applyMiddleware(thunkMiddleware)
        applyMiddleware(thunkMiddleware, createLogger())
    );
}