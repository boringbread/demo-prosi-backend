import React, { Component } from 'react';
import { Table } from 'reactstrap';
import { Container } from 'reactstrap';
import axios from "axios";
import './CapaianPembelajaran.css';

class CapaianPembelajaran extends Component {
  constructor(props) {
    super(props);
  }
  render() {
    return (
      <>
        <div className="Mahasiswa">
          <h3 className="text-black font-weight-light my-5 text-center">Tabel 8.a IPK Lulusan</h3>
        </div>
        <div className="cont_limit">
          <Container fluid="true">
            <Table striped bordered responsive className="text-center">
              <thead>
                <tr>
                  <th class="align-middle" rowSpan="2">Tahun Lulus</th>
                  <th class="align-middle" rowSpan="2">Jumlah Lulusan</th>
                  <th class="align-middle" colSpan="3">Indeks Prestasi Kumulatif (IPK)</th>
                </tr>
                <tr>
                  <th class="align-middle">Min</th>
                  <th class="align-middle">Rata-Rata</th>
                  <th class="align-middle">Maks</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>TS-2</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>TS-1</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>TS</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </Table>
          </Container>
        </div>
      </>
    )
  }
}
CapaianPembelajaran.propTypes = {
}

export default CapaianPembelajaran;