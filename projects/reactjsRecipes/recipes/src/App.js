import React, { Component } from 'react';
import './App.css';
import RecipeBook from './RecipeBook';
import { Route, Switch, Redirect, Link } from 'react-router-dom';
import AddRecipe from './AddRecipe';

class App extends Component {
  constructor(props) {
    super(props);
    this.state = {
        recipes: [
            { name: 'Macaroni', instructions: 'Boil water, add macaroni', picture: 'macaroni.jpg' },
            { name: 'Eggs', instructions: 'Boil water, add eggs', picture: 'eggs.jpg' }
        ]
    };
  }

  addRecipe = (recipe) => {
      // const recipes = this.state.recipes.slice();
      // recipes.push(recipe);
      const recipes = [...this.state.recipes, recipe];
      this.setState({ recipes: recipes });
  }

  render() {
    return (
      <div>
        <h2>PCS Recipe Book App</h2>
        <Link to="/">Recipe Book</Link> | <Link to="/addRecipe">Add Recipe</Link>
        <hr/>
        <Switch>
          <Redirect exact from="/" to="/recipeBook" />
          <Route path="/recipeBook" render={() => <RecipeBook recipes={this.state.recipes} />} />
          <Route path="/addRecipe" render={(routeProps) => <AddRecipe {...routeProps} addRecipe={this.addRecipe} />} />
          <Route render={() => <div>No such page</div>} />
        </Switch>
      </div>
    );
  }
}

export default App;
