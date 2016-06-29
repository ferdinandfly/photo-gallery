import React from 'react';
import { render } from 'react-dom';
import { Provider } from 'react-redux';
import configureStore from './configureStore'
import { browserHistory, Router, Route } from 'react-router'
import injectTapEventPlugin from "react-tap-event-plugin";

import getMuiTheme from 'material-ui/styles/getMuiTheme';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
injectTapEventPlugin();

import App from './components/App';
import Slider from './components/Slider';
const store = configureStore();
render(
    <Provider store={store}>
        <MuiThemeProvider muiTheme={getMuiTheme()} store={store}>
            <Router history={browserHistory}>
                <Route path="/" component={App}>
                    <Route path=":category" component={Slider}/>
                </Route>
            </Router>
        </MuiThemeProvider>
    </Provider>,
    document.getElementById('react_main')
);