import React, { Component } from "react";
import { Redirect } from 'react-router';
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";
import IndexJs from "./main.component";

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
	  fetch('http://localhost/Demo-Prosi/demo-prosi-backend/index.php/websiterestcontroller/insertData', {
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
		if(localStorage.getItem("loginState")!="1"){
			return <Redirect to="/" />
		}
		return (
			
		<div id="container">
			<IndexJs />
			<div className="auth-wrapper">
			<div className="auth-inner">
		  <Link to="/latihan_2">Users</Link>
			  <p/>
			  <form onSubmit={this.handleSubmit}>
				<p>
					<label>Username:</label>
					<input 
					type="email" 
					name="Username" 
					value={this.state.Username} 
					onChange={this.handleChange} 
					placeholder="Username" 
					required/>
				</p>
				<p>
					<label>Password:</label>
					<input 
					type="password" 
					name="Password" 
					value={this.state.Password} 
					onChange={this.handleChange} 
					placeholder="Password" 
					required />
				</p>
				<p>
					<a href="/latihan_2"><input type="submit" value="Submit" /></a>
				</p>
			  </form>
			  </div>
			  </div>
		   </div>
    );
	}
}