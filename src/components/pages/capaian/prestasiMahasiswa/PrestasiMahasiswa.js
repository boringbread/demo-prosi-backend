import React, { Component } from 'react';
import { TabContent, TabPane, Nav, NavItem, NavLink } from 'reactstrap';
import classnames from 'classnames';
import { Table } from 'reactstrap';
import { Container } from 'reactstrap';
import axios from "axios";
import { If, Then, Else } from 'react-if'; import './PrestasiMahasiswa.css';

class PrestasiMahasiswa extends Component {
  constructor(props) {
    super(props);

    this.toggle = this.toggle.bind(this);
    this.state = {
      activeTab: '1',
    };
  }

  componentDidMount() {
    // axios.get('/back-end/index.php/api/tabel3b1').then(data => {
    //   this.setState({ tabel3b1: data.data.result });
    // })
  }

  toggle(tab) {
    if (this.state.activeTab !== tab) {
      this.setState({
        activeTab: tab
      });
    }
  }
  render() {

    // const { tabel3b2 } = this.state;
    // let tabel3_b_2 = tabel3b2.map((d, i) => <tr>
    //   <If condition={d.sumberPembiayaan == "Jumlah"}>
    //     <Then>
    //       <td colSpan="2">{d.sumberPembiayaan}</td>
    //       <td>{d.ts2}</td>
    //       <td>{d.ts1}</td>
    //       <td>{d.ts}</td>
    //       <td>{d.jumlah}</td>
    //     </Then>
    //     <Else>
    //       <td>{i + 1}</td>
    //       <td className="text-left">{d.sumberPembiayaan}</td>
    //       <td>{d.ts2}</td>
    //       <td>{d.ts1}</td>
    //       <td>{d.ts}</td>
    //       <td>{d.jumlah}</td>
    //     </Else>
    //   </If>
    // </tr>);

    return (
      <div>
        <Nav className="justify-content-center" tabs>
          <NavItem>
            <NavLink
              className={classnames({ active: this.state.activeTab === '1' })}
              onClick={() => { this.toggle('1'); }}
            >T 8.b.1 Prestasi Akademik
            </NavLink>
          </NavItem>
          <NavItem>
            <NavLink
              className={classnames({ active: this.state.activeTab === '2' })}
              onClick={() => { this.toggle('2'); }}
            >T 8.b.2 Prestasi Non Akademik Mahasiswa
            </NavLink>
          </NavItem>
        </Nav>
        <TabContent activeTab={this.state.activeTab}>
          <TabPane tabId="1">
            <div>
              <h3 className="text-black font-weight-light my-5 text-center">Tabel 8.b.1 Prestasi Akademik </h3>
            </div>
            <div className="cont_limit">
              <Container fluid="true">
                <Table striped responsive bordered className="text-center">
                  <thead>
                    <tr>
                      <th class="align-middle" rowSpan="2">No.</th>
                      <th class="align-middle" rowSpan="2">Nama Kegiatan</th>
                      <th class="align-middle" rowSpan="2">Tahun Perolehan</th>
                      <th class="align-middle" colSpan="3">Tingkat</th>
                      <th class="align-middle" rowSpan="2">Prestasi yang Dicapai</th>
                    </tr>
                    <tr>
                      <th class="align-middle">Lokal/Wilayah</th>
                      <th class="align-middle">Nasional</th>
                      <th class="align-middle">Internasional</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td colSpan="3">Jumlah</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                </Table>
              </Container>
            </div>
          </TabPane>
          <TabPane tabId="2">
            <div>
              <h3 className="text-black font-weight-light my-5 text-center">Tabel 8.b.2 Prestasi Non Akademik Mahasiswa</h3>
            </div>
            <div className="cont_limit">
              <Container fluid="true">
              <Table striped responsive bordered className="text-center">
                  <thead>
                    <tr>
                      <th class="align-middle" rowSpan="2">No.</th>
                      <th class="align-middle" rowSpan="2">Nama Kegiatan</th>
                      <th class="align-middle" rowSpan="2">Tahun Perolehan</th>
                      <th class="align-middle" colSpan="3">Tingkat</th>
                      <th class="align-middle" rowSpan="2">Prestasi yang Dicapai</th>
                    </tr>
                    <tr>
                      <th class="align-middle">Lokal/Wilayah</th>
                      <th class="align-middle">Nasional</th>
                      <th class="align-middle">Internasional</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td colSpan="3">Jumlah</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                </Table>
              </Container>
            </div>
          </TabPane>
        </TabContent>
      </div>
    );
  }
}
PrestasiMahasiswa.propTypes = {
}

export default PrestasiMahasiswa;