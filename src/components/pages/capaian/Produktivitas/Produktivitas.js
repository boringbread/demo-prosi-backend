import React, {Component} from 'react';
import { Table } from 'reactstrap';
import { Container } from 'reactstrap';
import axios from "axios";
import PropTypes from 'prop-types';

class Produktivitas extends Component {
  constructor(props){
    super(props);
  }
  render(){
    return (
      <>
        <div className="Produktivitas">
          <h3 className="text-black font-weight-light my-5 text-center">Tabel 8.c. Masa Studi Lulusan Program Studi  
 </h3>
        </div>
        <div className="cont_limit">
          <Container fluid="true">
            <Table striped bordered responsive className="text-center">
              <thead>
                <tr>
                  <th class="align-middle" rowSpan="2">Tahun Masuk</th>
                  <th class="align-middle" rowSpan="2">Jumlah Mahasiswa Diterima</th>
                  <th class="align-middle" colSpan="7">Jumlah Mahasiswa yang Lulus pada</th>
                  <th class="align-middle" rowSpan="2">Jumlah Lulusan s.d. Akhir TS</th>
                  <th class="align-middle" rowSpan="2">Rata-rata Masa Studi</th>
                </tr>
                <tr>
                  <th class="align-middle">Akhir TS-6</th>
                  <th class="align-middle">Akhir TS-5</th>
                  <th class="align-middle">Akhir TS-4</th>
                  <th class="align-middle">Akhir TS-3</th>
                  <th class="align-middle">Akhir TS-2</th>
                  <th class="align-middle">Akhir TS-1</th>
                  <th class="align-middle">Akhir TS</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>TS-6</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>TS-5</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>TS-4</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
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
      </>
    )
  }
}
Produktivitas.propTypes = {
}

export default Produktivitas;