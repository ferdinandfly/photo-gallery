import React, { Component, PropTypes } from 'react';
import { getMedias } from '../helpers/functions';
import {connect} from 'react-redux';

class SliderComponent extends Component{
    componentWillMount(){
        getMedias(this.props.dispatch, this.props.category);
    }
    render(){
        return  (
            <div className="col-md-4 col-xs-12">
            </div>
        );
    }
}
const mapState = (state) => {
    return {
        category: state.main.category
    }
};
const Slider = connect(mapState)(SliderComponent);
export default Slider;