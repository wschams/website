import React from 'react';
import loadingGif from './loading.gif';
const Loading = (props) => {
    const loadingDiv = props.isLoading ? <div id="loadingDiv" >
        <img id="loadingGif" src={loadingGif} alt={'loading'} />
    </div> : null;
    return (
        loadingDiv
    );
}

export default Loading;