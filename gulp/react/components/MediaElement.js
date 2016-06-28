import React, {PropTypes} from 'react';

const MediaElement = ({media}) => (
    <div>
        <img src={media.media.url} />
        </div>
);

MediaElement.propTypes = {
    media: PropTypes.any.isRequired
};

export default MediaElement;