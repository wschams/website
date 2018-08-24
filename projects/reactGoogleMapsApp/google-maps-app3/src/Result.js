import React from 'react';
import PropTypes from 'prop-types';

const Result = (props) =>  {
    return (
        <li onClick={props.setInfoWindow}>
        <div className='result card bg-primary text-white rounded-0' style={{ width: '98%' }}>
        <img className='card-img-top rounded-0' src={props.image} alt={props.name} />
        <div className='card-body  text-center p-1'>
            <p className='card-title mb-0'>{props.name}</p>
        </div>
        </div>
        </li >)};

    export default Result
Result.propTypes = {
    setInfoWindow: PropTypes.func,
    name: PropTypes.string,
    image: PropTypes.string
};