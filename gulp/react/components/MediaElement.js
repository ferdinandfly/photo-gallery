import React, {PropTypes} from 'react';

const MediaElement = ({media}) => (
    <div>
        <img src={media.url} alt={media.name}/>

        {media.description ? <p className="small text-center"> <br />{media.description}</p>: null }
    </div>
);

MediaElement.propTypes = {
    media: PropTypes.any.isRequired
};

export default MediaElement;