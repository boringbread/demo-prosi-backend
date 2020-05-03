import React, { Component } from "react";
import IndexJs from './main.component';

export default function Goodbye() {
    return (
      <div>
      <IndexJs />
        <div className="auth-wrapper">
          <div className="auth-inner">
            <div style = {localStorage.hasOwnProperty('loginState')?(localStorage.getItem('loginState')==="1" ? {display:"none"}:{display:"inline"}) : {display:"inline"}} className="kalimat">
                <h1 className="text text-center">Sampai jumpa!!</h1>
            </div>
          </div>
        </div>
      </div>
    );
}
