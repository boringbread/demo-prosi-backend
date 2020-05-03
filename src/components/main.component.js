import React from "react";
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";

export default function Home(props)
    {
        const setLogoutState = () => {
            localStorage.setItem('loginState','0');
            // console.log("asdasd");
            // props.history.push("/goodbye");
          }
          // console.log(localStorage.hasOwnProperty('loginState'));
    return (
            <div className="App">
                <nav className="navbar navbar-expand-lg navbar-light fixed-top">
                    <div className="container">
                        <a href="/sign-in" className="navbar-brand" >
                            SI Akreditasi
                        </a>
                        <div className="collapse navbar-collapse" id="navbarTogglerDemo02">
                            <ul className="navbar-nav ml-auto">
                            <li style = {localStorage.hasOwnProperty('loginState')?(localStorage.getItem('loginState')==="1" ? {display:"none"}:{display:"inline"}) : {display:"inline"}} className="nav-item">
                  <a href="/sign-in" className="nav-link">
                    Login
                  </a>
                </li>
                <li style = {localStorage.hasOwnProperty('loginState')?(localStorage.getItem('loginState')==="1" ? {display:"none"}:{display:"inline"}) : {display:"inline"}} className="nav-item">
                  <a href="/sign-up" className="nav-link">
                    Sign up
                  </a>
                </li>
                <li style = {localStorage.hasOwnProperty('loginState')?(localStorage.getItem('loginState')==="1" ? {display:"inline"}:{display:"none"}) : {display:"none"}} className="nav-item">
                  <a href="/goodbye" onClick={setLogoutState} className="button nav-link">
                    Logout
                  </a>
                </li>
                <li style = {localStorage.hasOwnProperty('loginState')?(localStorage.getItem('loginState')==="1" ? {display:"inline"}:{display:"none"}) : {display:"none"}} className="nav-item">
                  <a href="/adduser"  className="button nav-link">
                    adduser
                  </a>
                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

    );
}