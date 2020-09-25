import React, {Component} from 'react';
import './Asing.css';
import { Table } from 'reactstrap';
import { Container } from 'reactstrap';

class Asing extends Component {
  constructor(props){
    super(props);
  }
  render(){
    return (
      <>
      <div className="TataPamong">
        <h3 className="text-black font-weight-light my-5 text-center">Tabel 2.b Mahasiswa Asing (Foreign Student)</h3>
      </div>
      <Container>
        <Table striped bordered responsive className="text-center">
          <thead>
            <tr>
              <th class="align-middle" rowSpan = "2">No</th>
              <th class="align-middle" rowSpan = "2">Program Studi</th>
              <th class="align-middle" colSpan = "3">Jumlah Mahasiswa Aktif</th>
              <th class="align-middle" colSpan = "3">Jumlah Mahasiswa Asing Penuh Waktu (<i>Full-time</i>)</th>
              <th class="align-middle" colSpan = "3">Jumlah Mahasiswa Asing Paruh Waktu (<i>Part-time</i>)</th>
            </tr>
            <tr>
              <th>TS-2</th>
              <th>TS-1</th>
              <th>TS</th>
              <th>TS-2</th>
              <th>TS-1</th>
              <th>TS</th>
              <th>TS-2</th>
              <th>TS-1</th>
              <th>TS</th>

            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Informatika</td>
              <td>20</td>
              <td>12</td>
              <td>11</td>
              <td>8</td>
              <td>12</td>
              <td>20</td>
              <td>8</td>
              <td>12</td>
              <td>20</td>
            </tr>
            <tr>
            <th scope="row">2</th>
              <td>Matematika</td>
              <td>20</td>
              <td>12</td>
              <td>11</td>
              <td>8</td>
              <td>12</td>
              <td>20</td>
              <td>8</td>
              <td>12</td>
              <td>20</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Fisika</td>
              <td>20</td>
              <td>12</td>
              <td>11</td>
              <td>8</td>
              <td>12</td>
              <td>20</td>
              <td>8</td>
              <td>12</td>
              <td>20</td>
            </tr>
            <tr>
              <th scope="row" colSpan="2">Jumlah</th>
              <td>50</td>
              <td>32</td>
              <td>41</td>
              <td>21</td>
              <td>10</td>
              <td>89</td>
              <td>13</td>
              <td>55</td>
              <td>71</td>
            </tr>

          </tbody>
        </Table>

      </Container>

    </>
    )
  }
}
Asing.propTypes = {
}

export default Asing;