import React from "react";
//import boostraplibrary
import "../node_modules/bootstrap/dist/css/bootstrap.min.css";
import "./App.css";
//import Router, Switch, Route, Link to change page
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";
//import components to make content of a page
import Login from "./components/login.component";
import SignUp from "./components/signup.component";
import Welcome from "./components/welcome.component";
import Latihan from "./components/latihan.component";
import Latihan_2 from "./components/latihan_2.component";
import AddUser from "./components/adduser.component";
import Update from "./components/update.component";
import registerServiceWorker from "./registerServiceWorker";

function App() {
  return (
    <Router>
      <div className="App">
        <nav className="navbar navbar-expand-lg navbar-light fixed-top">
          <div className="container">
            <Link className="navbar-brand" to={"/sign-in"}>
              SI Akreditasi
            </Link>
            <div className="collapse navbar-collapse" id="navbarTogglerDemo02">
              <ul className="navbar-nav ml-auto">
                <li className="nav-item">
                  <Link className="nav-link" to={"/sign-in"}>
                    Login
                  </Link>
                </li>
                <li className="nav-item">
                  <Link className="nav-link" to={"/sign-up"}>
                    Sign up
                  </Link>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <div className="auth-wrapper">
          <div className="auth-inner">
            <Switch>
              <Route exact path="/" component={Login} />
              <Route path="/sign-in" component={Login} />
              <Route path="/sign-up" component={SignUp} />
              <Route path="/latihan" component={Latihan} />
              <Route path="/latihan_2" component={Latihan_2} />
              <Route path="/adduser" component={AddUser} />
              <Route path="/update/:ID" component={Update} />
              <div className="welcomeP">
                <Route path="/welcome" component={Welcome} />
              </div>
            </Switch>
          </div>
        </div>
      </div>
    </Router>
  );
}

export default App;
