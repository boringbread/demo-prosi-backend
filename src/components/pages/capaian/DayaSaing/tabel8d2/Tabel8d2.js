import React, {Component} from 'react';
import PropTypes from 'prop-types';
import { Table } from 'reactstrap';
import { Container } from 'reactstrap';
import './Tabel8d2.css';

class Tabel8d2 extends Component {
  constructor(props){
    super(props);
  }
  render(){
    return (
      <>
        <div className="Tabel8d2">
          <div className="Produktivitas">
            <h3 className="text-black font-weight-light my-5 text-center">Tabel 8.d.2 Kesesuaian Bidang Kerja Lulusan</h3>
          </div>
          <div className="cont_limit">
            <Container fluid="true">
              <Table striped bordered responsive className="text-center">
                <thead>
                  <tr>
                    <th class="align-middle" rowSpan="2">Tahun Lulus</th>
                    <th class="align-middle" rowSpan="2">Jumlah Lulusan</th>
                    <th class="align-middle" rowSpan="2">Jumlah Lulusan yang Terlacak</th>
                    <th class="align-middle" colSpan="3">Jumlah Lulusan Terlacak dengan Tingkat Kesesuaian Bidang Kerja </th>
                  </tr>
                  <tr>
                    <th class="align-middle">Rendah</th>
                    <th class="align-middle">Sedang</th>
                    <th class="align-middle">Tinggi</th>
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
Tabel8d2.propTypes = {
}

export default Tabel8d2;