import React, {Component} from 'react';
import PropTypes from 'prop-types';
import { Table } from 'reactstrap';
import { Container } from 'reactstrap';
import './Tabel8e2.css';

class Tabel8e2 extends Component {
  constructor(props){
    super(props);
  }
  render(){
    return (
      <>
        <div className="Tabel8e2">
          <div className="Produktivitas">
            <h3 className="text-black font-weight-light my-5 text-center">Tabel 8.e.2 Kepuasan Pengguna</h3>
          </div>
          <div className="cont_limit">
            <Container fluid="true">
              <Table striped bordered responsive className="text-center">
                <thead>
                  <tr>
                    <th class="align-middle" rowSpan="2">No.</th>
                    <th class="align-middle" rowSpan="2">Jenis Kemampuan</th>
                    <th class="align-middle" colSpan="4">Tingkat Kepuasan Pengguna (%)</th>
                    <th class="align-middle" rowSpan="2">Rencana Tindak Lanjut oleh UPPS/PS</th>
                  </tr>
                  <tr>
                    <th class="align-middle">Sangat Baik</th>
                    <th class="align-middle">Baik</th>
                    <th class="align-middle">Cukup</th>
                    <th class="align-middle">Kurang</th>
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
                    <td>5</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>7</td>
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
        </div>
      </>
    )
  }
}
Tabel8e2.propTypes = {
}

export default Tabel8e2;