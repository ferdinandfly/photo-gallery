import React from 'react';
import { render } from 'react-dom';
import { Provider } from 'react-redux';
import { browserHistory, Router, Route } from 'react-router'
import injectTapEventPlugin from "react-tap-event-plugin";

import ListMap from './containers/ListMap';
import configureStore from './configureStore'
import { URL_INSTITUTE_PREFIX, URL_FORMATION_PREFIX} from "./helper/config"
import InstituteMap from './components/InstituteMap';
import FormationMap from './components/FormationMap';
import SideBar from './components/SideBar';

injectTapEventPlugin();
const store = configureStore();
render(
    <Provider store={store}>
            <Router history={browserHistory}>
                <Route path="/" component={ListMap}>
                    <Route path={URL_INSTITUTE_PREFIX+"*"} component={InstituteMap}/>
                    <Route path={URL_FORMATION_PREFIX+"*"} component={FormationMap}/>
                    <Route path="*" component={SideBar}/>
                </Route>
            </Router>
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