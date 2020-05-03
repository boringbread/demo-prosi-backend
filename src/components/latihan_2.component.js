import React, { Component } from "react";
import { Redirect } from 'react-router';
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";
import IndexJs from "./main.component";
export default class Latihan_2 extends Component{
	constructor(props) {
    super(props);
    this.state = {
      users: []
    };
    this.headers = [
			{ key: 'ID', label: 'ID'},
			{ key: 'Username', label: 'Username' },
			{ key: 'Password', label: 'Password' }
		];

    this.deleteUser = this.deleteUser.bind(this);
  }

	componentDidMount() {
		fetch('http://localhost/Demo-Prosi/demo-prosi-backend/index.php/websiterestcontroller/getAllUser')
			.then(response => {
				return response.json();
			}).then(result => {
				console.log(result);
				this.setState({
					users:result
				});
			});
	}

  deleteUser(id) {
		if(window.confirm("Are you sure want to delete?")) {
			fetch('http://localhost/Demo-Prosi/demo-prosi-backend/index.php/websiterestcontroller/deleteUser/' + id, {
	                method : 'DELETE'
				}).then(response => { 
					if(response.status === 200) {
						alert("User sudah dihapus");
                            fetch('http://localhost/Demo-Prosi/demo-prosi-backend/index.php/websiterestcontroller/getAllUser')
						.then(response => {
							return response.json();
						}).then(result => {
							console.log(result);
							this.setState({
								users:result
							});
						});
					} 
			 });
		}
	}


	render() {
		if(localStorage.getItem("loginState")!="1"){
			return <Redirect to="/" />
		}
		return (
			<div>
			<IndexJs />
			<div id="container">
				<Link to="/adduser">&#43; Tambah Pengguna</Link>
				<p/>
				<table className="text-center table table-striped">
					<thead className="thead-dark">
						<tr>
						{
							this.headers.map(function(h) {
								return (
									<th key = {h.key}>{h.label}</th>
								)
							})
						}
						  <th>Actions</th>
						</tr>
					</thead>
					<tbody>
						{
							this.state.users.map(function(item, key) {
							return (
								<tr key = {key}>
								  <td>{item.ID}</td>
								  <td>{item.Username}</td>
								  <td>{item.Password}</td>
								  <td> 
								  		<Link className="btn btn-success m-2" to={`/update/${item.ID}`}>Edit</Link>
										 
										<a href="javascript:void(0);" className="btn btn-danger" onClick={this.deleteUser.bind(this, item.ID)}>Delete</a>
								  </td>
								</tr>
											)
							}.bind(this))
						}
					</tbody>
				</table>
			</div>
			</div>
		)
	}
}