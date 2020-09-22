//import boostraplibrary
import "../node_modules/bootstrap/dist/css/bootstrap.min.css";
import "./App.css";
//import Router, Switch, Route, Link to change page
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";
//import components to make content of a page
import React, { useState } from "react";
import Login from "./components/login.component";
import DragAndDrop from "./components/dragAndDrop.component";
import SignUp from "./components/signup.component";
import Welcome from "./components/welcome.component";
import Latihan from "./components/latihan.component";
import Latihan_2 from "./components/latihan_2.component";
import AddUser from "./components/adduser.component";
import Update from "./components/update.component";
import registerServiceWorker from "./registerServiceWorker";
import Goodbye from "./components/goodbye.component";
import { AuthContext } from "./Auth_Context";
import IndexJs from "./components/main.component";
import PrivateRoute from "./Private_Route";

function App() {
  const [authTokens, setAuthTokens] = useState(
    localStorage.getItem("tokens") || ""
  );
  const setTokens = (data) => {
    localStorage.setItem("tokens", JSON.stringify(data));
    setAuthTokens(data);
  };
  const reducer = (state, action) => {
    switch (action.type) {
      case "SET_DROP_DEPTH":
        return { ...state, dropDepth: action.dropDepth };
      case "SET_IN_DROP_ZONE":
        return { ...state, inDropZone: action.inDropZone };
      case "ADD_FILE_TO_LIST":
        return { ...state, fileList: state.fileList.concat(action.files) };
      default:
        return state;
    }
  };

  const [data, dispatch] = React.useReducer(reducer, {
    dropDepth: 0,
    inDropZone: false,
    fileList: [],
  });

  return (
    <div className="App">
      <AuthContext.Provider value={{ authTokens, setAuthTokens: setTokens }}>
        <Router>
          <PrivateRoute exact path="/welcome" component={Welcome} />
          <PrivateRoute exact path="/goodbye" component={Goodbye} />
          <PrivateRoute exact path="/" component={Latihan} />
          <PrivateRoute exact path="/sign-in" component={Latihan} />
          <PrivateRoute exact path="/sign-up" component={SignUp} />
          <Route path="/upload">
            <DragAndDrop data={data} dispatch={dispatch} />
          </Route>
          <PrivateRoute exact path="/latihan" component={Latihan} />
          <PrivateRoute exact path="/latihan_2" component={Latihan_2} />
          <Route path="/adduser" component={AddUser} />
          <Route path="/update/:ID" component={Update} />
          <div className="welcomeP">
            <Route path="/welcome" component={Welcome} />
          </div>
        </Router>
      </AuthContext.Provider>
    </div>
  );
}


export default App;
