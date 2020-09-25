import React, {Component} from 'react';
import { TabContent, TabPane, Nav, NavItem, NavLink } from 'reactstrap';
import classnames from 'classnames';
import PropTypes from 'prop-types';
import './DayaSaing.css';
import Tabel8d1 from './tabel8d1/Tabel8d1';
import Tabel8d2 from './tabel8d2/Tabel8d2';

class DayaSaing extends Component {
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
            >T 8.d.1 Waktu Tunggu Lulusan
            </NavLink>
          </NavItem>
          <NavItem>
            <NavLink
              className={classnames({ active: this.state.activeTab === '2' })}
              onClick={() => { this.toggle('2'); }}
            >T 8.d.2 Kesesuaian Bidang Kerja Lulusan
            </NavLink>
          </NavItem>
        </Nav>
        <TabContent activeTab={this.state.activeTab}>
          <TabPane tabId="1">
            <Tabel8d1 />
          </TabPane>
          <TabPane tabId="2">
            <Tabel8d2 />
          </TabPane>
        </TabContent>
      </div>
    );
  }
}
DayaSaing.propTypes = {
}

export default DayaSaing;