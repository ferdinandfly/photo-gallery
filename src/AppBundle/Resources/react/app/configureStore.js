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
    const initialState =
    {
        main: {
            elements: []
        }
    };
    return createStore(
        reducer,
        initialState,
        //applyMiddleware(thunkMiddleware)
        applyMiddleware(thunkMiddleware, createLogger())
    );
}