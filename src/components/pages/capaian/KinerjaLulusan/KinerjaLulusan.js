import React, {Component} from 'react';
import { TabContent, TabPane, Nav, NavItem, NavLink } from 'reactstrap';
import classnames from 'classnames';
import PropTypes from 'prop-types';
import './KinerjaLulusan.css';
import Tabel8e1 from './tabel8e1/Tabel8e1';
import Tabel8e2 from './tabel8e2/Tabel8e2';

class KinerjaLulusan extends Component {
  constructor(props){
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
            >T 8.e.1 Tempat Kerja Lulusan
            </NavLink>
          </NavItem>
          <NavItem>
            <NavLink
              className={classnames({ active: this.state.activeTab === '2' })}
              onClick={() => { this.toggle('2'); }}
            >T 8.e.2 Kepuasan Pengguna
            </NavLink>
          </NavItem>
        </Nav>
        <TabContent activeTab={this.state.activeTab}>
          <TabPane tabId="1">
            <Tabel8e1 />
          </TabPane>
          <TabPane tabId="2">
            <Tabel8e2 />
          </TabPane>
        </TabContent>
      </div>
    );
  }
}
KinerjaLulusan.propTypes = {
}

export default KinerjaLulusan;