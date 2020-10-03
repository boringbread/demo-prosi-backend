import React, { Component } from "react";
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";
import { Redirect } from 'react-router';
import IndexJs from './main.component';

export default class Welcome extends Component {
  render() {
    if(localStorage.getItem("loginState")!="1"){
			return <Redirect to="/" />
		}
    return (
      <div>
      <IndexJs />
        <div className="auth-wrapper">
          <div className="auth-inner">
          <div style = {localStorage.hasOwnProperty('log inState')?(localStorage.getItem('loginState')==="1" ? {display:"inline"}:{display:""}) : {display:"inline"}} className="kalimat">
          <h1 className="text-center">Selamat Datang di SI Akreditasi Informatika UNPAR</h1>
          <a href="/Latihan_2"><h3>Anda akan diarahkan ke websitenya....</h3></a>
        </div>
          </div>
        </div>
      </div>
     
    );
  }
}
