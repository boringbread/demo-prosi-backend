import React from "react";
import "./App.css";
import { Route, Redirect } from "react-router-dom";
import { useAuth } from "./Auth_Context";

function PrivateRoute({ component: Component, ...rest }) {
  const { authTokens } = useAuth();
  //console.log(authTokens === null ? "ada token" : "tidak ada token");
  if(authTokens == 'undefined'){
    console.log("--berisi : " + authTokens);
  }else{
    console.log("--kosong zzzz "  + authTokens);
  }
  return (
    <Route
      {...rest}
      render={props =>
        authTokens == 'undefined' ? <Redirect to="/" /> : <Component {...props} /> 
      }
    />
  );
}

export default PrivateRoute;