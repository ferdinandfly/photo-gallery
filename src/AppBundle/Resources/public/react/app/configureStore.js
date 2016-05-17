import { createStore, combineReducers, applyMiddleware } from 'redux'
import {reducer as formReducer} from 'redux-form';
import thunkMiddleware from 'redux-thunk'
import createLogger from 'redux-logger'
import galleryReducer from './reducers/galleryReducer'

const reducer = combineReducers({
    gallery: galleryReducer,
    form: formReducer
});

export default function configureStore() {
    const initialState =
    {
        gallery: {}
    };
    return createStore(
        reducer,
        initialState,
        //applyMiddleware(thunkMiddleware)
        applyMiddleware(thunkMiddleware, createLogger())
    );
}