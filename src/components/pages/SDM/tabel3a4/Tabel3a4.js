import React, { Component } from 'react';
import { Table } from 'reactstrap';
import { Container, Col, Row } from 'reactstrap';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faCheck } from '@fortawesome/free-solid-svg-icons'
import axios from "axios";
import { When } from 'react-if';
import { Input, FormGroup } from 'reactstrap';
import './Tabel3a4.css';

class Tabel3a4 extends Component {
  constructor(props) {
    super(props);

    this.toggleModal = this.toggleModal.bind(this);

    this.state = {
      tabel3a4: [],
      tabel3a4Filtered: [],
      modal: false,
      tabelNamaDosen: []
    };
  }
  toggleModal() {
    this.setState(prevState => ({
      modal: !prevState.modal
    }));
  }

  update(e) {
    var x = this.state.tabel3a;
    let searchQuery = e.target.value;
    let regexer = new RegExp(searchQuery, "i");
    this.setState({
      tabel3a4Filtered: this.state.tabel3a4.filter(d => searchQuery.length == 0 || d.NamaDosen.match(regexer))
    });
  }

  componentDidMount() {
    axios.get('website-akreditasi-front-end/index.php/api/tabel3a4').then(data => {
      this.setState({ tabel3a4: data.data.result, tabel3a4Filtered: data.data.result });
    })
  }
  render() {
    var sesuai = 0;
    const { tabel3a4, tabel3a4Filtered } = this.state;
    let tabel3_a_4 = tabel3a4Filtered.map((d, i) => {
      if (d.KesesuaianBidangKeahlian == 'V') {
        sesuai += 1;
      }
      return <tr>
        <td>{d.Nomor}</td>
        <td style={{ textAlign: 'left', width: 190 }}>{d.NamaDosen}</td>
        <td>{d.NIDN}</td>
        <td>{d.Pendidikan}</td>
        <td>{d.BidangKeahlian}</td>
        <td>{d.JabatanAkademik}</td>
        <td>{d.SertifikatPendidik}</td>
        <td>{d.SertifikatKompetensi}</td>
        <td>{d.MataKuliahPSYangDiampu}</td>
        <td>
          <When condition={d.KesesuaianBidangKeahlian == "V"}>
            <FontAwesomeIcon icon={faCheck} />
          </When>
        </td>
      </tr>
    });

    return (
      <>
        <Container>
          <h3 className="text-black font-weight-light my-5 text-center">Tabel 3.a.3  Dosen Tidak Tetap yang ditugaskan sebagai pengampu mata kuliah di Program Studi yang Diakreditasi</h3>
        </Container>
        <Container fluid>
          <div className="px-4">
            <Row className="mb-2">
              <Col md={3} className="ml-auto">
                <Input type="text" onChange={this.update.bind(this)} placeholder="Cari Dosen" />
              </Col>
            </Row>
            <Row>
              <Col>
                <Table striped responsive bordered className="text-center">
                  <thead>
                    <tr>
                      <th className="align-middle">No.</th>
                      <th className="align-middle">Nama Dosen</th>
                      <th className="align-middle">NIDN/NIDK</th>
                      <th className="align-middle">Pendidikan Pasca Sarjana</th>
                      <th className="align-middle">Bidang Keahlian</th>
                      <th className="align-middle">Jabatan Akademik</th>
                      <th className="align-middle">Sertifikat Pendidik Profesional</th>
                      <th className="align-middle">Sertifikat Profesi/ Kompensasi/ Industri</th>
                      <th className="align-middle">Mata Kuliah yang Diampu pada PS yang Diakreditasi</th>
                      <th className="align-middle">Kesesuaian Bidang Keahlian dengan Mata Kuliah yang Diampu</th>
                    </tr>
                  </thead>
                  <tbody>
                    {tabel3_a_4}
                    <tr>
                      <td>Jumlah</td>
                      <td>{tabel3_a_4.length}</td>
                      <td colSpan="4"></td>
                      <td>0</td>
                      <td>0</td>
                      <td></td>
                      <td>{sesuai}</td>
                    </tr>
                  </tbody>
                </Table>
              </Col>
            </Row>
          </div>
        </Container>
      </>
    )
  }
}
Tabel3a4.propTypes = {
}

export default Tabel3a4;