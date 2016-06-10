import { createStore, combineReducers, applyMiddleware } from 'redux'
import thunkMiddleware from 'redux-thunk'
import createLogger from 'redux-logger'
import mainReducer from './reducers/mainReducer'

const reducer = combineReducers({
    main: mainReducer
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