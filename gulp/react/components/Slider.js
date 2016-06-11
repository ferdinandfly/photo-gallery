import React, { Component, PropTypes } from 'react';
import { getMedias } from '../helpers/functions';

class Slider extends Component{
    componentWillMount(){
        getMedias(this.props.dispatch,this.props.category);
    }
    render(){
        return  (
            <div className="col-md-4 col-xs-12">
            </div>
        );
    }
}
export default  Slider;