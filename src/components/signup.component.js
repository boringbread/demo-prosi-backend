import React, { Component } from "react";
import "../index.css";
import IndexJs from './main.component';

function hasSignUp(){
    // props.history.push("/sign-in");
}
export default class SignUp extends Component {

    render(){
    return (
        <div>
            <IndexJs />
            <div className="auth-wrapper">
                <div className="auth-inner">
                    <form onSubmit={this.hasSignUp}>
                        <h3>Sign Up</h3>

                        <div className="form-group">
                            <label>First name</label>
                            <input type="text" className="form-control" placeholder="First name" />
                        </div>

                        <div className="form-group">
                            <label>Last name</label>
                            <input type="text" className="form-control" placeholder="Last name" />
                        </div>

                        <div className="form-group">
                            <label>Email address</label>
                            <input type="email" className="form-control" placeholder="Enter email" />
                        </div>

                        <div className="form-group">
                            <label>Password</label>
                            <input type="password" className="form-control" placeholder="Enter password" />
                        </div>

                        <button type="submit" className="btn btn-primary btn-block">Sign Up</button>
                        <p className="forgot-password text-right">
                            Already registered <a href="/">sign in?</a>
                        </p>
                    </form> 
                </div>
            </div>
        </div>
    );
    }
}