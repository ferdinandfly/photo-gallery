import React, {PropTypes} from 'react';

const MediaElement = ({media}) => (
    <div>
        {media.created_at}
    </div>
);

MediaElement.propTypes = {
    media: PropTypes.any.isRequired
};

export default MediaElement;