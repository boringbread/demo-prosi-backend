import React, { Component } from 'react';
import { Table } from 'reactstrap';
import { Chart } from "react-google-charts";
import { Button, Modal, ModalHeader, ModalBody, ModalFooter } from 'reactstrap';
import { Container, Col, Row } from 'reactstrap';
import axios from "axios";
import { If, Then } from 'react-if';
import './Tabel3b4.css';

class Tabel3b4 extends Component {
  constructor(props) {
    super(props);

    this.state = {
      tabel3b4Jurnal: [],
      tabel3b4Seminar: [],
      tabel3b4Tulisan: [],
      modal: false,
    };
    this.toggleModal = this.toggleModal.bind(this);
  }

  toggleModal() {
    if (this.state.modal == true) {
      this.setState({ modal: false });
    } else {
      this.setState({ modal: true });
    }
  }

  componentDidMount() {
    axios.get('website-akreditasi-front-end/index.php/api/tabel3b4Jurnal').then(data => {
      this.setState({ tabel3b4Jurnal: data.data.result });
    })
    axios.get('website-akreditasi-front-end/index.php/api/tabel3b4Seminar').then(data => {
      this.setState({ tabel3b4Seminar: data.data.result });
    })
    axios.get('website-akreditasi-front-end/index.php/api/tabel3b4Tulisan').then(data => {
      this.setState({ tabel3b4Tulisan: data.data.result });
    })
  }
  render() {
    const { tabel3b4Jurnal } = this.state;
    var ct = 0;
    var ts_2 = [];
    var ts_1 = [];
    var ts_ = [];
    var jumlah_ = [];
    var jenis_ = [];

    let ts2 = 0;
    let ts1 = 0;
    let ts = 0;
    let total = 0;
    let tabel3_b_4 = tabel3b4Jurnal.map((d, i) => {

      if (d.jenisPublikasi != "Jumlah") {
        ts_2[ct] = d.ts2;
        ts_1[ct] = d.ts1;
        ts_[ct] = d.ts;
        jumlah_[ct] = d.jumlah;
        jenis_[ct] = d.jenisPublikasi;
        ct++;
      }

      if (d.jenisPublikasi == "Jumlah") {
        ts2 = ts2 + d.ts2;
        ts1 = ts1 + d.ts1;
        ts = ts + d.ts;
        total = total + d.jumlah;
      }
      return <If condition={d.jenisPublikasi != "Jumlah"}>
        <Then>
          <tr>
            <td>{i + 1}</td>
            <td className="text-left">{d.jenisPublikasi}</td>
            <td>{d.ts2}</td>
            <td>{d.ts1}</td>
            <td>{d.ts}</td>
            <td>{d.jumlah}</td>
          </tr>
        </Then>
      </If>
    });

    const { tabel3b4Seminar } = this.state;
    var seminar_ = [];
    var ts_2_seminar = [];
    var ts_1_seminar = [];
    var ts_seminar = [];

    let tabel3_b_4b = tabel3b4Seminar.map((d, i) => {
      if (d.jenisPublikasi != "Jumlah") {
        ts_2[ct] = d.ts2;
        ts_1[ct] = d.ts1;
        ts_[ct] = d.ts;
        jumlah_[ct] = d.jumlah;
        jenis_[ct] = d.jenisPublikasi;
        ct++;
      }
      if (d.jenisPublikasi == "Jumlah") {
        ts2 = ts2 + d.ts2;
        ts1 = ts1 + d.ts1;
        ts = ts + d.ts;
        total = total + d.jumlah;
      }
      return <If condition={d.jenisPublikasi != "Jumlah"}>
        <Then>
          <tr>
            <td>{i + 5}</td>
            <td className="text-left">{d.jenisPublikasi}</td>
            <td>{d.ts2}</td>
            <td>{d.ts1}</td>
            <td>{d.ts}</td>
            <td>{d.jumlah}</td>
          </tr>
        </Then>
      </If>
    });

    tabel3_b_4.push(tabel3_b_4b);

    const { tabel3b4Tulisan } = this.state;
    var tulisan_ = [];
    let tabel3_b_4c = tabel3b4Tulisan.map((d, i) => {
      if (d.jenisPublikasi != "Jumlah") {
        ts_2[ct] = d.ts2;
        ts_1[ct] = d.ts1;
        ts_[ct] = d.ts;
        jumlah_[ct] = d.jumlah;
        jenis_[ct] = d.jenisPublikasi;
        ct++;
      }
      if (d.jenisPublikasi == "Jumlah") {
        ts2 = ts2 + d.ts2;
        ts1 = ts1 + d.ts1;
        ts = ts + d.ts;
        total = total + d.jumlah;
      }
      return <If condition={d.jenisPublikasi != "Jumlah"}>
        <Then>
          <tr>
            <td>{i + 8}</td>
            <td className="text-left">{d.jenisPublikasi}</td>
            <td>{d.ts2}</td>
            <td>{d.ts1}</td>
            <td>{d.ts}</td>
            <td>{d.jumlah}</td>
          </tr>
        </Then>
      </If>
    });

    tabel3_b_4.push(tabel3_b_4c);
    return (
      <>
        <Container>
          <h3 className="text-black font-weight-light my-5 text-center">Tabel 3.b.4 Publikasi Ilmiah DTPS</h3>
        </Container>
        <Container fluid="true">
          <div className="px-4">
            <Row className="mb-2">
              <Col>
                <Button color="primary" className="grafik" onClick={() => {
                  this.setState({
                    modal: true
                  });
                }}>Grafik</Button>
              </Col>
            </Row>
            <Row>
              <Col>
                <Table striped responsive bordered className="text-center">
                  <thead>
                    <tr>
                      <th class="align-middle" rowSpan="2">No.</th>
                      <th class="align-middle" rowSpan="2">Media Publikasi</th>
                      <th class="align-middle" colSpan="3">Jumlah Judul</th>
                      <th class="align-middle" rowSpan="2">Jumlah</th>
                    </tr>
                    <tr>
                      <th class="align-middle">TS-2</th>
                      <th class="align-middle">TS-1</th>
                      <th class="align-middle">TS</th>
                    </tr>
                  </thead>
                  <tbody>
                    {tabel3_b_4}
                    <tr>
                      <th colSpan="2">Jumlah</th>
                      <td>{ts2}</td>
                      <td>{ts1}</td>
                      <td>{ts}</td>
                      <td>{total}</td>
                    </tr>
                  </tbody>
                </Table>
              </Col>
            </Row>
          </div>
        </Container>

        <div>
          <Modal size={'xl'} isOpen={this.state.modal} toggle={this.toggleModal} className={this.props.className}>
            <ModalHeader toggle={this.toggleModal}>Grafik Pengabdian Kepada Masyarakat (PkM) DTPS</ModalHeader>
            <ModalBody>
              <Container>
                <Chart
                  height="700px"
                  chartType="BarChart"
                  loader={<div>Loading Chart</div>}
                  data={[
                    ['Publikasi Ilmiah', 'TS-2', 'TS-1', 'TS', 'Jumlah Judul'],
                    [jenis_[0], ts_2[0], ts_1[0], ts_[0], jumlah_[0]],
                    [jenis_[2], ts_2[2], ts_1[2], ts_[2], jumlah_[2]],
                    [jenis_[3], ts_2[3], ts_1[3], ts_[3], jumlah_[3]],
                    [jenis_[5], ts_2[5], ts_1[5], ts_[5], jumlah_[5]],
                    [jenis_[6], ts_2[6], ts_1[6], ts_[6], jumlah_[6]],
                    [jenis_[7], ts_2[7], ts_1[7], ts_[7], jumlah_[7]],
                    [jenis_[8], ts_2[8], ts_1[8], ts_[8], jumlah_[8]],
                  ]}
                  options={{
                    title: 'Publikasi Ilmiah TS-2',
                    chartArea: { width: '53%' },
                    hAxis: {
                      title: 'Data',
                      minValue: 0,
                    },
                  }}
                  rootProps={{ 'data-testid': '1' }}
                />
              </Container>
            </ModalBody>
          </Modal>
        </div >
      </>
    )
  }
}
Tabel3b4.propTypes = {
}

export default Tabel3b4;