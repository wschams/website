import React, { Component } from 'react';
import PropTypes from 'prop-types';

export default class SearchBar extends Component {
    constructor(props) {
        super(props);
        this.state = {
            input:''
        };
    }
    
    handleInputChange = (event) => {
        const target = event.target;
        const value = target.value;
        const name = target.name;

        this.setState({
            [name]: value
        });
    }

    handleSubmit = (event) => {
        this.props.fetchPlaces(this.state.input);
        event.preventDefault();
    }

    handleClear = (event) => {
        this.props.reset();
        this.setState(
            () => {
                return {input: ''}
            }
          );
        event.preventDefault();
        event.target.blur();
    }

    render() {
        return (
            <form onSubmit={this.handleSubmit}>
                <div className="row mt-4">
                    <div className="col col-md-10 offset-md-1">
                        <div className="input-group mb-3">
                            <input type="text" id="input" name="input" className="form-control" placeholder="SearchReactMaps" aria-label="Search" aria-describedby="basic-addon2" value={this.state.input} onChange={this.handleInputChange} />
                            <div className="input-group-append">
                                <button type="submit" id="go" className="btn btn-success" onClick={(el) => {el.target.blur() }} >Go</button>
                            </div>
                            <div className="input-group-append">
                                <button id="clear" className="btn btn-danger" onClick = {this.handleClear} >Clear</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        );
    }
}

SearchBar.propTypes = {
    fetchPlaces: PropTypes.func,
    reset: PropTypes.func
};