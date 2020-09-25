import React, {Component} from 'react';
import PropTypes from 'prop-types';
import './Input.css';
import { Table } from 'reactstrap';
import { Container, Row, Col } from 'reactstrap';

class Input extends Component {
  constructor(props){
    super(props);
  }
  render(){
    return (
      <>
      <div className="TataPamong">
        <h3 className="text-black font-weight-light my-5 text-center">Tabel 2.a Seleksi Mahasiswa</h3>
      </div>
      <Container>
        <Table striped responsive bordered className="text-center">
          <thead>
            <tr>
              <th class="align-middle" rowSpan = "2">Tahun Akademik</th>
              <th class="align-middle" rowSpan = "2">Daya Tampung</th>
              <th class="align-middle" colSpan = "2">Jumlah Calon Mahasiswa</th>
              <th class="align-middle" colSpan = "2">Jumlah Mahasiswa Baru</th>
              <th class="align-middle" colSpan = "2">Jumlah Mahasiswa Aktif</th>
            </tr>
            <tr>
              <th>Pendaftar</th>
              <th>Lulus Seleksi</th>
              <th>Reguler</th>
              <th>Transfer</th>
              <th>Reguler</th>
              <th>Transfer</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">2016</th>
              <td>120</td>
              <td>400</td>
              <td>120</td>
              <td>120</td>
              <td>0</td>
              <td>500</td>
              <td>20</td>
            </tr>
            <tr>
            <th scope="row">2017</th>
              <td>120</td>
              <td>500</td>
              <td>115</td>
              <td>114</td>
              <td>1</td>
              <td>513</td>
              <td>4</td>
            </tr>
            <tr>
              <th scope="row">2018</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>

            </tr>
            <tr>
              <th scope="row">2019</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th scope="row">TS</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>NRTS = </td>
              <td>NTTS = </td>
            </tr>
            <tr>
              <th scope="row" colSpan="2">Jumlah</th>
              <td><strong>NA = </strong>1531</td>
              <td><strong>NB = </strong>392</td>
              <td><strong>NC = </strong>388</td>
              <td><strong>ND = </strong> 4</td>
              <td colSpan="2"><strong>NM = </strong></td>
            </tr>

          </tbody>
        </Table>

      </Container>

    </>
    )
  }
}
Input.propTypes = {
}

export default Input;