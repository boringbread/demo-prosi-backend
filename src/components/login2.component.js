import React, { Component } from "react";
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";

export default class Login extends Component {

    constructor(props) {
        super(props);
        this.state = {users: []};
        this.headers = [
            {key: 'ID', label: 'ID'},
            {key: 'Username', label: 'Username'},
            {key: 'Password', label: 'Password'}
        ];
    }

    componentDidMount() {
        fetch('http://localhost/Demo-Prosi-ci/index.php/websiterestcontroller/getUser')
        .then(response => {
            return response.json();
        }).then(result => {
            console.log(result);
            this.setState({
                users:result
            });
        });
    }

    handleSubmit(event){
        
    }

    render() {
        return (
            <form>
                <h3>Sign In</h3>

                <div className="form-group">
                    <label>Email address</label>
                    <input type="email" className="form-control" placeholder="Enter email" />
                </div>

                <div className="form-group">
                    <label>Password</label>
                    <input type="password" className="form-control" placeholder="Enter password" />
                </div>

                <div className="form-group">
                    <div className="custom-control custom-checkbox">
                        <input type="checkbox" className="custom-control-input" id="customCheck1" />
                        <label className="custom-control-label" htmlFor="customCheck1">Remember me</label>
                    </div>
                </div>

                <Link className="nav-link" to={"/welcome"}> <button type="submit" className="btn btn-primary btn-block">Submit</button></Link>
                <p className="forgot-password text-right">
                    Forgot <a href="#">password?</a>
                </p>
            </form>
        );
    }
}