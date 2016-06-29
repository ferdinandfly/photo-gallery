import React, {PropTypes} from 'react';

const MediaElement = ({media}) => (
        <img src={media.url}  alt={media.name}/>
);

MediaElement.propTypes = {
    media: PropTypes.any.isRequired
};

export default MediaElement;