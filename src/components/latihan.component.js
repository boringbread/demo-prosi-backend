import React, { Component } from "react";
import { Redirect } from 'react-router';
import "../index.css";
import IndexJs from "./main.component";

export default class Latihan extends Component {
  constructor(props) {
    super(props);
    this.state = {
      value: '',
      Username: '',
      Password: '',
      users: [],
      redirect: false
    };

    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  handleChange(event) {
      const state = this.state;
      state[event.target.name] = event.target.value;
      this.setState(state);
  }

  handleSubmit(event) {
    event.preventDefault();
    fetch('http://localhost/Demo-Prosi/demo-prosi-backend/index.php/websiterestcontroller/login', {
      method: 'POST',
      body: JSON.stringify({
        Username: this.state.Username,
        Password: this.state.Password
      }),
      headers: {
        "Content-type": "application/json; charset=UTF-8"
      }
    }).then(response => {
        if(response.status === 200) {
          this.setState({
            redirect: true
          });
          localStorage.setItem("loginState","1");
        } else {
          alert("Username atau Password anda salah");
        }
      });
  }

  render() {
      if (localStorage.getItem("loginState")=="1") {
        return <Redirect push to="/welcome" />;
      }

    return (
      <div>
        <IndexJs />
        <div className="auth-wrapper">
          <div className="auth-inner">
          <form onSubmit={this.handleSubmit} method="POST">
              <h3>Sign In</h3>
  
              <div className="form-group">
                <label>Email address</label>
                <input 
                  required type="email" 
                  className="form-control"
                  name="Username" 
                  value={this.state.Username} 
                  onChange={this.handleChange} 
                />
              </div>
  
              <div className="form-group">
                <label>Password</label>
                <input 
                  required type="Password" 
                  className="form-control"
                  name="Password" 
                  value={this.state.Password} 
                  onChange={this.handleChange} 
                />
              </div>
  
              <div className="form-group">
                <div className="custom-control custom-checkbox">
                  <input
                    type="checkbox"
                    className="custom-control-input"
                    id="customCheck1"
                  />
                  <label className="custom-control-label" htmlFor="customCheck1">
                    Remember me
                  </label>
                </div>
              </div>
              <input className="d-block btn btn-info" type="submit" value="Submit" />
              <p className="forgot-password text-right">
                Forgot <a href="#">password?</a>
              </p>
            </form>
          </div>
        </div>
      </div>
    );
  }
}