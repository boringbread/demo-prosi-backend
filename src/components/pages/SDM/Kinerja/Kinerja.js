import React, { Component } from 'react';
import { TabContent, TabPane, Nav, NavItem, NavLink } from 'reactstrap';
import classnames from 'classnames';
import './Kinerja.css';
import Tabel3b1 from '../tabel3b1/Tabel3b1';
import Tabel3b2 from '../tabel3b2/Tabel3b2';
import Tabel3b3 from '../tabel3b3/Tabel3b3';
import Tabel3b4 from '../tabel3b4/Tabel3b4';
import Tabel3b5 from '../tabel3b5/Tabel3b5';
import Tabel3b7 from '../tabel3b7/Tabel3b7';

class Kinerja extends Component {
  constructor(props) {
    super(props);
    this.toggle = this.toggle.bind(this);
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
  render() {
    return (
      <div>
        <Nav className="justify-content-center" tabs>
          <NavItem>
            <NavLink
              className={classnames({ active: this.state.activeTab === '1' })}
              onClick={() => { this.toggle('1'); }}
            >T 3.b.1 Pengakuan/Rekognisi
            </NavLink>
          </NavItem>
          <NavItem>
            <NavLink
              className={classnames({ active: this.state.activeTab === '2' })}
              onClick={() => { this.toggle('2'); }}
            >T 3.b.2 Penelitian
            </NavLink>
          </NavItem>
          <NavItem>
            <NavLink
              className={classnames({ active: this.state.activeTab === '3' })}
              onClick={() => { this.toggle('3'); }}
            >T 3.b.3 PkM DTPS
            </NavLink>
          </NavItem>
          <NavItem>
            <NavLink
              className={classnames({ active: this.state.activeTab === '4' })}
              onClick={() => { this.toggle('4'); }}
            >T 3.b.4 Publikasi Ilmiah
            </NavLink>
          </NavItem>
          <NavItem>
            <NavLink
              className={classnames({ active: this.state.activeTab === '5' })}
              onClick={() => { this.toggle('5'); }}
            >T 3.b.5. Luaran Penelitian/PkM
            </NavLink>
          </NavItem>
          <NavItem>
            <NavLink
              className={classnames({ active: this.state.activeTab === '6' })}
              onClick={() => { this.toggle('6'); }}
            >T 3.b.6 Karya ilmiah
            </NavLink>
          </NavItem>
        </Nav>
        <TabContent activeTab={this.state.activeTab}>
          <TabPane tabId="1">
            <Tabel3b1 />
          </TabPane>
          <TabPane tabId="2">
            <Tabel3b2 />
          </TabPane>
          <TabPane tabId="3">
            <Tabel3b3 />
          </TabPane>
          <TabPane tabId="4">
            <Tabel3b4 />
          </TabPane>
          <TabPane tabId="5">
            <Tabel3b7 />
          </TabPane>
          <TabPane tabId="6">
            <Tabel3b5 />
          </TabPane>
        </TabContent>
      </div>
    );
  }
}
Kinerja.propTypes = {
}

export default Kinerja;