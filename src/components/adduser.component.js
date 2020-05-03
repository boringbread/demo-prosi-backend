import React, { Component } from "react";
import { Redirect } from 'react-router';
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";

export default class adduser extends Component{
	constructor(props) {
    super(props);
    this.state = {
      Username: '',
      Password: ''
    };
    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  	}

  	handleChange(event){
  		const state = this.state;
  		state[event.target.name] = event.target.value;
  		this.setState(state);
  	}

  	handleSubmit(event) {
	  event.preventDefault();
	  fetch('http://localhost/demo-prosi-ci/index.php/websiterestcontroller/insertData', {
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
					alert("Berhasil menambahkan user");
				} else {
					alert("Error bang "+this.state.Username+" "+this.state.Password);
				}
			});
	}



	render() {
		return (
		<div id="container">
		  <Link to="/latihan_2">Users</Link>
			  <p/>
			  <form onSubmit={this.handleSubmit}>
				<p>
					<label>Username:</label>
					<input type="text" name="Username" value={this.state.Username} onChange={this.handleChange} placeholder="Username" />
				</p>
				<p>
					<label>Password:</label>
					<input type="text" name="Password" value={this.state.Password} onChange={this.handleChange} placeholder="Password" />
				</p>
				<p>
					<input type="submit" value="Submit" />
				</p>
			  </form>
		   </div>
    );
	}
}