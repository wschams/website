import React from "react";
import { withScriptjs, withGoogleMap, GoogleMap } from "react-google-maps";
import PropTypes from 'prop-types';

const Map = (props)=> {
    const mapLoaded = (map) => {
        props.setMap(map);
    }
    return (
        <GoogleMap
            ref={mapLoaded.bind(this)}
            defaultZoom={props.zoom}
            defaultCenter={props.center}
            >
            {props.markers}
            </GoogleMap>
    )
}
export default withScriptjs(withGoogleMap(Map));

Map.propTypes = {
    zoom: PropTypes.number,
    center: PropTypes.object,
    markers: PropTypes.array,
    setMap: PropTypes.func
};