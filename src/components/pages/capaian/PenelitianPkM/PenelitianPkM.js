import React, {Component} from 'react';
import { useState } from 'react';
import { TabContent, TabPane, Nav, NavItem, NavLink, Card, Button, CardTitle, CardText, Row, Col } from 'reactstrap';import './PenelitianPkM.css';
import classnames from 'classnames';
import Tabel8f1 from './tabel8f1/Tabel8f1';
import Tabel8f2 from './tabel8f2/Tabel8f2';
import Tabel8f3 from './tabel8f3/Tabel8f3';


class PenelitianPkM extends Component {
  constructor(props){
    super(props);
    this.state = {
      activeTab: '1',
    };
  }
  toggle(tab) {
    if (this.state.activeTab !== tab) {
      this.setState({
        activeTab: tab
      });
    }
  }
  render(){
    return (

      <div>
        <Nav className="justify-content-center" tabs>
          <NavItem>
            <NavLink
              className={classnames({ active: this.state.activeTab === '1' })}
              onClick={() => { this.toggle('1'); }}
            >T 8.f.1 Publikasi Ilmiah
            </NavLink>
          </NavItem>
          <NavItem>
            <NavLink
              className={classnames({ active: this.state.activeTab === '2' })}
              onClick={() => { this.toggle('2'); }}
            >T 8.f.2 Karya Ilmiah
            </NavLink>
          </NavItem>
          <NavItem>
            <NavLink
              className={classnames({ active: this.state.activeTab === '3' })}
              onClick={() => { this.toggle('3'); }}
            >T 8.f.3 Luaran Penelitian/PkM
            </NavLink>
          </NavItem>
        </Nav>
        <TabContent activeTab={this.state.activeTab}>
          <TabPane tabId="1">
            <Tabel8f1 />
          </TabPane>
          <TabPane tabId="2">
            <Tabel8f2 />
          </TabPane>
          <TabPane tabId="3">
            <Tabel8f3 />
          </TabPane>
        </TabContent>
      </div>
    )
  }
}
PenelitianPkM.propTypes = {
}

export default PenelitianPkM;