import React, { Component } from 'react';
import { Table, Col } from 'reactstrap';
import { Container } from 'reactstrap';
import { If, Then, Else } from 'react-if';
import { Button, Modal, ModalHeader, ModalBody, ModalFooter } from 'reactstrap';
import { Chart } from "react-google-charts";
import axios from "axios";
import './Tabel8f1.css';


class Tabel8f1 extends Component {
  constructor(props) {
    super(props);
    this.state = {
      tabel8f1: [],
      tabel8f1Seminar: [],
    }
  }

  componentDidMount() {
    axios.get('website-akreditasi-front-end/index.php/api/tabel8f1JurnalMahasiswa').then(data => {
      this.setState({ tabel8f1: data.data.result });
    })
    axios.get('website-akreditasi-front-end/index.php/api/tabel8f1SeminarMahasiswa').then(data => {
      this.setState({ tabel8f1Seminar: data.data.result });
    })
  }

  render() {
    var ts2 = 0;
    var ts1 = 0;
    var ts = 0;
    var jumlah = 0;
    const { tabel8f1 } = this.state;
    let tabel_8_f_1 = tabel8f1.map((d, i) => {
      if (d.jenisPublikasi != 'Jumlah') {
        ts2 += d.ts2;
        ts1 += d.ts1;
        ts += d.ts;
        jumlah += d.jumlah;
      }
      return <If condition={d.jenisPublikasi !== 'Jumlah'}>
        <Then>
          <tr>
            <td>{i + 1}</td>
            <td style={{ textAlign: 'left' }}>{d.jenisPublikasi}</td>
            <td>{d.ts2}</td>
            <td>{d.ts1}</td>
            <td>{d.ts}</td>
            <td>{d.jumlah}</td>
          </tr>
        </Then>
      </If>

    });
    const { tabel8f1Seminar } = this.state;
    let tabel_8_f_1b = tabel8f1Seminar.map((d, i) => {
      if (d.jenisPublikasi != 'Jumlah') {
        ts2 += d.ts2;
        ts1 += d.ts1;
        ts += d.ts;
        jumlah += d.jumlah;
      }
      return <If condition={d.jenisPublikasi !== 'Jumlah'}>
        <Then>
          <tr>
            <td>{i + 5}</td>
            <td style={{ textAlign: 'left' }}>{d.jenisPublikasi}</td>
            <td>{d.ts2}</td>
            <td>{d.ts1}</td>
            <td>{d.ts}</td>
            <td>{d.jumlah}</td>
          </tr>
        </Then>
      </If>
    });
    tabel_8_f_1.push(tabel_8_f_1b);
    return (
      <>
        <div>
          <h3 className="text-black font-weight-light my-5 text-center">Tabel 8.f.1  Publikasi Ilmiah mahasiswa</h3>
        </div>
        <div className="cont_limit">
          <Container fluid={true}>
            {/* <Button color="primary" className="grafik" onClick={() => {
              this.setState({
                modal: true
              });
            }}>Grafik</Button> */}
            <Table striped bordered className="text-center">
              <thead>
                <tr>
                  <th className="align-middle" rowSpan="2">No.</th>
                  <th className="align-middle" rowSpan="2">Media  Publikasi</th>
                  <th className="align-middle" colSpan="3">Jumlah Judul</th>
                  <th className="align-middle" rowSpan="2">Jumlah</th>
                </tr>
                <tr>
                  <th className="align-middle">TS-2</th>
                  <th className="align-middle">TS-1</th>
                  <th className="align-middle">TS</th>
                </tr>
              </thead>
              <tbody>
                {tabel_8_f_1}
                <td colSpan="2">Jumlah</td>
                <td>{ts2}</td>
                <td>{ts1}</td>
                <td>{ts}</td>
                <td>{jumlah}</td>
              </tbody>
            </Table>
          </Container>
        </div>
      </>
    )
  }
}
Tabel8f1.propTypes = {
}

export default Tabel8f1;