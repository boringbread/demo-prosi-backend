import React, { Component } from "react";
import { Redirect } from 'react-router';

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
    fetch('http://localhost/demo-prosi-ci/index.php/websiterestcontroller/login', {
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
        } else {
          alert("Username atau Password anda salah");
        }
      });
  }

  render() {
      if (this.state.redirect) {
        return <Redirect push to="/welcome" />;
      }
    return (
      <form onSubmit={this.handleSubmit} method="POST">

        <h3>LOGIN</h3>

        <div className="form-group">
          <label className="d-block">Name:</label>
          <input required type="text" className="form-control w-100" name="Username" value={this.state.Username} onChange={this.handleChange} />
        </div>

        <div className="form-group">
          <label className="d-block">Password :</label>
          <input required type="Password" className="form-control w-100" name="Password" value={this.state.Password} onChange={this.handleChange} />
        </div>

        <input className="d-block btn btn-info" type="submit" value="Submit" />
      </form>
    );
  }
}