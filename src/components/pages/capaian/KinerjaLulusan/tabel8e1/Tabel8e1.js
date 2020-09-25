import React, {Component} from 'react';
import PropTypes from 'prop-types';
import { Table } from 'reactstrap';
import { Container } from 'reactstrap';
import './Tabel8e1.css';

class Tabel8e1 extends Component {
  constructor(props){
    super(props);
  }
  render(){
    return (
      <>
        <div className="Tabel8e1">
          <div className="Produktivitas">
            <h3 className="text-black font-weight-light my-5 text-center">Tabel 8.e.1 Tempat Kerja Lulusan</h3>
          </div>
          <div className="cont_limit">
            <Container fluid="true">
              <Table striped bordered responsive className="text-center">
                <thead>
                  <tr>
                    <th class="align-middle" rowSpan="2">Tahun Lulus</th>
                    <th class="align-middle" rowSpan="2">Jumlah Lulusan</th>
                    <th class="align-middle" rowSpan="2">Jumlah Lulusan yang Terlacak</th>
                    <th class="align-middle" colSpan="3">Jumlah Lulusan Terlacak yang Bekerja berdasarkan Tingkat/Ukuran Tempat Kerja/Berwirausaha</th>
                  </tr>
                  <tr>
                    <th class="align-middle">Lokal/ Wilayah/ Berwirausaha tidak Berizin</th>
                    <th class="align-middle">Nasional/ Berwirausaha Berizin</th>
                    <th class="align-middle">Multinasiona/ Internasional</th>
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
                  <tr>
                    <td>Jumlah</td>
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
Tabel8e1.propTypes = {
}

export default Tabel8e1;