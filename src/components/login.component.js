import React, { Component } from "react";
import { Redirect } from 'react-router';
import IndexJs from "./main.component";
import axios from "axios";

export default class Latihan extends Component {
  constructor(props) {
    super(props);
    this.state = {
      value: '',
      Username: '',
      Password: '',
      users: [],
      redirect: false,
      testUname: ''
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

    axios.post('/demo-prosi-backend/index.php/C_Login/login', {
      Username: this.state.Username,
      Password: this.state.Password
    }).then((data) => {
      // console.log(data.data.result);
      this.setState({ testUname: data.data.result});
      console.log(this.state.testUname);
    }).then((response) => {
      if(this.state.testUname == true) {
        this.setState({redirect: true});
        localStorage.setItem("loginState","1");
        return <Redirect push to="/welcome" />;
      } else {
        alert("Username atau password anda salah");
      }
    });
  }

  render() {
      if (localStorage.getItem("loginState")=="1") {
        return <Redirect push to="/" />;
      }

    return (
      <div>
        <IndexJs />
        <div className="container">
          <div className="auth-inner">
          <form onSubmit={this.handleSubmit} method="POST">
              <h3>Sign In</h3>  
  
              <div className="form-group">
                <label>Username</label>
                <input 
                  required type="username" 
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