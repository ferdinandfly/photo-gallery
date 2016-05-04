import React from 'react';
import { render } from 'react-dom';
import { Provider } from 'react-redux';
import configureStore from './configureStore'
const store = configureStore();
render(
    <Provider store={store}>
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