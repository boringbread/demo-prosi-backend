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
import Goodbye from "./components/goodbye.component";

function App() {
  return (
    <Router>   
            <Switch>
              <Route exact path="/" component={Latihan} />
              <Route path="/sign-in" component={Latihan} />
              <Route path="/sign-up" component={SignUp} />
              <Route path="/latihan" component={Latihan} />
              <Route path="/latihan_2" component={Latihan_2} />
              <Route path="/goodbye" component={Goodbye} />
              <Route path="/adduser" component={AddUser} />
              <Route path="/update/:ID" component={Update} />
              <div className="welcomeP">
                <Route path="/welcome" component={Welcome} />
              </div>
            </Switch>


    </Router>
  );
}

export default App;
