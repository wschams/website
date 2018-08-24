import React from 'react';
import Result from './Result';
import noImage from './noImage.png';
import PropTypes from 'prop-types';

    const ResultList = (props)=>{ 
        const addResults = places => {
            return places.map(place =>
                <Result
                    key={place.id}
                    image={place.photos ? place.photos[0].getUrl({ 'maxWidth': 150, 'maxHeight': 100 }) : noImage}
                    name={place.name}
                    setInfoWindow={() => props.setInfoWindow(place)}
                />
            );
        }

        const results = props.places && addResults(props.places);
        const resultsList = props.isResultList && <div className="col col-lg-2 col-6 col-md-5 offset-lg-0 offset-md-4 offset-3">
                    <ul onClick={window.innerWidth < 768 ? props.toggle : undefined } id="resultsList" className="list-unstyled rounded" >
                        {!props.places && "No Results"}
                        {results}
                    </ul>
                </div>;
            return (
                resultsList
            );
    }
    export default ResultList
    
ResultList.propTypes = {
    setInfoWindow: PropTypes.func,
    places: PropTypes.array
};