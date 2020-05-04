import React, { Component } from "react";
import { Redirect } from 'react-router';
import IndexJs from "./main.component";

export default class Update extends Component{
	constructor(props){
		super(props);
		this.state = {
			ID: '',
			Username: '',
			Password: ''
		};

		this.handleChange = this.handleChange.bind(this);
		this.handleSubmit = this.handleSubmit.bind(this);
		// this.test = this.test.bind(this);
	}

	componentDidMount(){
		fetch('http://localhost/Demo-Prosi/demo-prosi-backend/index.php/websiterestcontroller/getUser/'+this.props.match.params.ID)
		.then(response => {
			return response.json();
		}).then(result => {
			console.log(result);
			this.setState({
				ID:result.ID,
				Username:result.Username
			});
		});	
	}

	handleChange(event) {
      const state = this.state;
      state[event.target.name] = event.target.value;
      this.setState(state);
  }

	handleSubmit(event){
		event.preventDefault();
		fetch('http://localhost/Demo-Prosi/demo-prosi-backend/index.php/websiterestcontroller/update', {
			METHOD: 'PUT',
			Body: JSON.stringify({
		        ID: this.state.ID,
		        Password: this.state.Password
			})
		}).then(response => {
        if(response.status === 200) {
          alert("Update berhasil");
        } else {
          alert("Terjadi masalah teknis");
          console.log('a')
        }
      });
	}

	render() {
		if(localStorage.getItem("loginState")!="1"){
			return <Redirect to="/" />
		}
		return (
			<div>
				<IndexJs />
			<div className="auth-wrapper">
			<div className="auth-inner">
			<form onSubmit={this.handleSubmit} method="POST">

				<h3>Updating Password {this.state.Username}</h3>

		        <div className="form-group">
		          <label className="d-block">Password :</label>
		          <input required type="Password" className="form-control w-100" name="Password" value={this.state.Password} onChange={this.handleChange} />
		        </div>

		        <input className="d-block btn btn-info" type="submit" value="Submit" />
      		</form>
			  </div>
			  </div>
			</div>
		)
	}
}