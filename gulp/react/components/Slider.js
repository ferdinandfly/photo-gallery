import React, { Component, PropTypes } from 'react';
import { getMedias } from '../helpers/functions';
import {connect} from 'react-redux';
import MediaElement from './MediaElement';
import OwlCarousel from 'react-owl-carousel';

class SliderComponent extends Component {
    componentWillMount() {
        getMedias(this.props.dispatch, this.props.params.category);
    }

    componentWillReceiveProps(nextProps) {
        if (this.props.params.category !== nextProps.params.category) {
            getMedias(this.props.dispatch, nextProps.params.category);
        }
    }

    render() {
        let { medias  } = this.props;
        return (
            <div>
                <h1 className="text-center">{this.props.params.category}</h1>
                <OwlCarousel slideSpeed={300} navigation singleItem autoPlay autoHeight>
                    { medias.map(media =>
                        <MediaElement media={ media.media} key={media.position}/>
                    )}
                </OwlCarousel>
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