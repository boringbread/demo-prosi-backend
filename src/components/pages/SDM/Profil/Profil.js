import React, { Component } from 'react';
import './Profil.css';
import { TabContent, TabPane, Nav, NavItem, NavLink, Card, Button, CardTitle, CardText } from 'reactstrap';
import classnames from 'classnames';
import Tabel3a1 from '../tabel3a1/Tabel3a1';
import Tabel3a2 from '../tabel3a2/Tabel3a2';
import Tabel3a3 from '../tabel3a3/Tabel3a3';
import Tabel3a4 from '../tabel3a4/Tabel3a4';



class Profil extends Component {
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
      <>
        <div>
          <Nav className="justify-content-center" tabs>
            <NavItem>
              <NavLink className={classnames({ active: this.state.activeTab === '1' })} onClick={() => { this.toggle('1'); }}>
                T 3.a.1 Dosen Tetap Pengampuan Program Studi
            </NavLink>
            </NavItem>
            <NavItem>
              <NavLink className={classnames({ active: this.state.activeTab === '3' })} onClick={() => { this.toggle('3'); }}>
                T 3.a.2 Ekuivalen Waktu Mengajar Dosen
            </NavLink>
            </NavItem>
            <NavItem>
              <NavLink className={classnames({ active: this.state.activeTab === '4' })} onClick={() => { this.toggle('4'); }}>
              T 3.a.3 Dosen Tidak Tetap  Pengampuan Program Studi
            </NavLink>
            </NavItem>
            <NavItem>
              <NavLink className={classnames({ active: this.state.activeTab === '2' })} onClick={() => { this.toggle('2'); }}>
                T 3.a.4 Dosen Pembimbing Utama Tugas Akhir
            </NavLink>
            </NavItem>
          </Nav>
          <TabContent activeTab={this.state.activeTab}>
            <TabPane tabId="1">
              <Tabel3a1 />
            </TabPane>
            <TabPane tabId="2">
              <Tabel3a2 />
            </TabPane>
            <TabPane tabId="3">
              <Tabel3a3 />
            </TabPane>
            <TabPane tabId="4">
              <Tabel3a4 />
            </TabPane>
          </TabContent>
        </div>
      </>
    )
  }
}
Profil.propTypes = {
}

export default Profil;