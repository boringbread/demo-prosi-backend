import React, {Component} from 'react';
import { Table } from 'reactstrap';
import { Container } from 'reactstrap';
import PropTypes from 'prop-types';
import './Tabel8d1.css';

class Tabel8d1 extends Component {
  constructor(props){
    super(props);
  }
  render(){
    return (
      <>
        <div className="Tabel8d1">
          <div className="Produktivitas">
            <h3 className="text-black font-weight-light my-5 text-center">Tabel 8.d.1 Waktu Tunggu Lulusan</h3>
          </div>
          <div className="cont_limit">
            <Container fluid="true">
              <Table striped bordered responsive className="text-center">
                <thead>
                  <tr>
                    <th class="align-middle" rowSpan="2">Tahun Lulus</th>
                    <th class="align-middle" rowSpan="2">Jumlah Lulusan</th>
                    <th class="align-middle" rowSpan="2">Jumlah Lulusan yang Terlacak</th>
                    <th class="align-middle" colSpan="3">Jumlah Lulusan Terlacak dengan Waktu Tunggu Mendapatkan Pekerjaan</th>
                  </tr>
                  <tr>
                    <th class="align-middle">WT &lt; 6 bulan</th>
                    <th class="align-middle">6 ≤ WT ≤ 18 bulan</th>
                    <th class="align-middle">WT > 6 bulan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>TS-4</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>TS-3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>TS-2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </Table>
            </Container>
          </div>
        </div>
      </>
    )
  }
}
Tabel8d1.propTypes = {
}

export default Tabel8d1;