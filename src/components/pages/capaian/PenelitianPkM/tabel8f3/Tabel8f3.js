import React, { Component } from 'react';
import { Table } from 'reactstrap';
import { Container } from 'reactstrap';
import { If, Then, Else } from 'react-if';
import axios from "axios";
import './Tabel8f3.css';

class Tabel8f3 extends Component {
  constructor(props) {
    super(props);
    this.state = {
      tabel8f4: [],
    }
  }
  componentDidMount() {
    axios.get('website-akreditasi-front-end/index.php/api/tabel8f4').then(data => {
      this.setState({ tabel8f4: data.data.result });
    })
  }

  render() {
    var jumlah = 0;
    const { tabel8f4 } = this.state;
    let tabel_8_f_4 = tabel8f4.map((d, i) => {
      if (d.JudulLuaran === 'Jumlah') {
        jumlah = d.tahun;
        console.log(jumlah)
      }
      return <tr>
        <If condition={d.JudulLuaran === 'Hak cipta'}>
          <Then>
            <td>1</td>
            <td style={{ textAlign: 'left' }}>{d.JudulLuaran}</td>
            <td>{d.tahun}</td>
            <td style={{ textAlign: 'left', width: '30%' }}>{d.keterangan}</td>
          </Then>
          <Else>
            <If condition={d.JudulLuaran === 'Jumlah'}>
              <Then>
              </Then>
              <Else>
                <td></td>
                <td style={{ textAlign: 'left' }}>{d.JudulLuaran}</td>
                <td>{d.tahun}</td>
                <td style={{ textAlign: 'left', width: '30%' }}>{d.keterangan}</td>
              </Else>
            </If>
          </Else>
        </If>

      </tr>
    });
    return (
      <> <div>
        <h3 className="text-black font-weight-light my-5 text-center">Tabel 8.f.3 Luaran penelitian/PkM yang dihasilkan mahasiswa</h3>
      </div>
        <div className="cont_limit">
          <Container fluid={true}>
            <Table striped bordered className="text-center">
              <thead>
                <tr>
                  <th className="align-middle">No.</th>
                  <th className="align-middle">Judul Luaran Penelitian/PkM</th>
                  <th className="align-middle">Tahun</th>
                  <th className="align-middle">Keterangan</th>
                </tr>
              </thead>
              <tbody>
                {tabel_8_f_4}
                <td colSpan='2'>Jumlah</td>
                <td>{jumlah}</td>
              </tbody>
            </Table>
          </Container>
        </div>
      </>
    )
  }
}
Tabel8f3.propTypes = {
}

export default Tabel8f3;