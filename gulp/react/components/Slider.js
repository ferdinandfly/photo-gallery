import React, { Component, PropTypes } from 'react';
import { getMedias } from '../helpers/functions';
import {connect} from 'react-redux';
import MediaElement from './MediaElement';
class SliderComponent extends Component{
    componentWillMount(){
        getMedias(this.props.dispatch, this.props.params.category);
    }
    componentWillReceiveProps(nextProps) {
        if (this.props.params.category!== nextProps.params.category){
            getMedias(this.props.dispatch, nextProps.params.category);
        }
    }
    render(){
        let { medias  } = this.props;
        return  (
            <div className="col-md-4 col-xs-12">
                <h1>{this.props.params.category}</h1>
                { medias.map(media =>
                    <MediaElement media={ media} key={media.position}/>
                )}
            </div>
        );
    }
}
const mapState = (state) => {
    return {
        medias: state.main.medias
    }
};
const Slider = connect(mapState)(SliderComponent);
export default Slider;