/*global google*/
import React, { Component } from 'react';
import { Marker, InfoWindow } from "react-google-maps";
import SearchBar from './SearchBar';
import ResultList from './ResultList';
import Map from './GoogleMaps';
import Loading from './Loading';
import './App.css';

class App extends Component {
  constructor(props) {
    super(props);
    this.state = {
      map: null,
      places: null,
      isLoading: true,
      isResultList: true,
      isMap: true,
      isButton: false
    };
  }

  setMap = (map) => {
    if (this.state.map !== null)
      return

    this.setState(
      () => {
        return { map, isLoading: false }
      }
    );
  }

  fetchPlaces = (type) => {
    this.setState({ isLoading: true });
    const bounds = this.state.map.getBounds();
    const service = new google.maps.places.PlacesService(this.state.map.context.__SECRET_MAP_DO_NOT_USE_OR_YOU_WILL_BE_FIRED);
    const request = {
      bounds: bounds,
      query: type
    };
    service.textSearch(request, (results, status) => {
      if (status === google.maps.places.PlacesServiceStatus.OK) {
        this.addPlaces(results);
      } /* else {
        this.reset();
      } */
      this.setState({ isLoading: false });
    })
  }

  addPlaces = (places) => {
    var bounds = new google.maps.LatLngBounds();
    places.forEach((place) => {
      this.createMarker(place);
      bounds.extend(place.geometry.location);
    });
    this.state.map.fitBounds(bounds);
    this.setState(() => {
      return { places }
    });
  }

  createMarker = (place, isInfoWindow) => {
    return place.marker = <Marker
      key={place.id}
      position={place.geometry.location}
      title={place.name}
      onClick={() => this.setInfoWindow(place)}
    >{isInfoWindow &&
      <InfoWindow>
        <div style={{ maxWidth: '125' }}>
          <h6 className='text-success text-center'>{place.name}</h6>
          <div>{place.formatted_address}
          </div>
        </div>
      </InfoWindow>}
    </Marker>;
  }

  setInfoWindow = thisPlace => {
    let tempPlaces = this.state.places;
    tempPlaces.forEach(place => {
      let isInfoWindow = false;
      if (place.id === thisPlace.id) {
        isInfoWindow = true;
      }
      this.createMarker(place, isInfoWindow);
    });
    this.state.map.panTo(thisPlace.geometry.location);
    this.setState({ places: tempPlaces });
  }

  reset = () => {
    this.setState({ places: null });
  }

  componentDidMount() {
    if (window.innerWidth < 992) {
      this.setState({ isResultList: false, isButton: true });
    }
    window.addEventListener("resize", this.resize.bind(this));
  }

  resize() {
    if (window.innerWidth < 992) {
      if(this.state.isMap) {
      this.setState({ isResultList: false, isMap: true, isButton: true });
      } else {
        this.setState({ isResultList: true, isMap: false, isButton: true });
      }
  } else {
    this.setState({ isResultList: true, isMap: true, isButton: false });
  }
  }

  toggle = (event) => {
      this.setState(
        () => {
          return { isMap: !this.state.isMap, isResultList: !this.state.isResultList }
        }
      );
      event.target.blur();
  }

  render() {
    return (
      <div className="main">
        <Loading isLoading={this.state.isLoading} />
        <div className="text-center text-white bg-primary p-4">
          <h1>reactMaps</h1>
        </div>
        <div className="container">
          <SearchBar reset={this.reset} fetchPlaces={this.fetchPlaces} />
          <div id="resultsDisplay" className="row">
            <ResultList toggle={this.toggle} places={this.state.places} setInfoWindow={this.setInfoWindow} isResultList={this.state.isResultList} />
            <div className={"col col-lg-10 col-md-12" + (!this.state.isMap && " d-none")}>
              <div id="map" >
                <Map
                  zoom={2}
                  center={{ lat: 0, lng: 0 }}
                  googleMapURL="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwjVJ-WpJnGNbjvc22XiLEd5EQrZocgr0&libraries=places"
                  loadingElement={<div style={{ height: `100%` }} />}
                  containerElement={<div style={{ height: `70vh` }} />}
                  mapElement={<div style={{ height: `100%` }} />}
                  setMap={this.setMap}
                  markers={this.state.places && this.state.places.map(place => place.marker)}
                  isMap={this.state.isMap}
                />
              </div>
            </div>
            </div>
            <div className={"row " + (!this.state.isButton ? "d-none" : undefined)}>
              <button onClick={this.toggle} className={"col col-12 fixed-bottom bg-secondry text-light" + (this.state.isResultList && "col col-6" )}>
              {this.state.isMap ? 'SHOW LIST' : 'SHOW MAP'}</button>
          </div>
        </div>
      </div>
    );
  }
}
/* navbar fixed-bottom bg-secondry text-light */
export default App;