import React from 'react';
import { render } from 'react-dom';
import { Provider } from 'react-redux';
import configureStore from './configureStore'
import { browserHistory, Router, Route } from 'react-router'
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import getMuiTheme from 'material-ui/styles/getMuiTheme';
import injectTapEventPlugin from 'react-tap-event-plugin';
injectTapEventPlugin();

import App from './components/App';
const store = configureStore();
render(
    <Provider store={store}>
        <MuiThemeProvider muiTheme={getMuiTheme()} store={store}>
            <Router history={browserHistory}>
                <Route path="/" component={App}>

                </Route>
            </Router>
        </MuiThemeProvider>
    </Provider>,
    document.getElementById('react_main')
);
//var s =
//    document.createElement('script');
//s.src ="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcJegvamppfgrp2qrNfOITo7Arx0xoeM8&libraries=places&callback=initAutocomplete";
//s.async =  true;
//
//s.onload = function() {
//
//};
//
//document.querySelector('head').appendChild(s);