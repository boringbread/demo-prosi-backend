import React, { Component } from "react";
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";

export default class Welcome extends Component {
  render() {
    return (
      <div className="kalimat">
        <h1>Selamat Datang</h1>
        <a href="/Latihan_2">Lihat DataBase</a>
      </div>
    );
  }
}
