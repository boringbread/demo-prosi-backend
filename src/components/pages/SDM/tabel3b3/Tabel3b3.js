import React, { Component } from 'react';
import { Table } from 'reactstrap';
import { Chart } from "react-google-charts";
import { Button, Modal, ModalHeader, ModalBody, ModalFooter } from 'reactstrap';
import { Container, Col, Row } from 'reactstrap';
import axios from "axios";
import { If, Then, Else } from 'react-if';
import './Tabel3b3.css';
import { cpus } from 'os';

class Tabel3b3 extends Component {
  constructor(props) {
    super(props);

    this.state = {
      tabel3b3: [],
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
    axios.get('website-akreditasi-front-end/index.php/api/tabel3b3').then(data => {
      this.setState({ tabel3b3: data.data.result });
    })
  }
  render() {
    const { tabel3b3 } = this.state;
    var jumlah = [];
    var ts2 = [];
    var ts1 = [];
    var ts = [];

    let tabel3_b_3 = tabel3b3.map((d, i) => {
      ts2[i] = d.ts2;
      ts1[i] = d.ts1;
      ts[i] = d.ts;
      jumlah[i] = d.jumlah;
      return <tr>
        <If condition={d.sumberPembiayaan === "Jumlah"}>
          <Then>
            <td colSpan="2">{d.sumberPembiayaan}</td>
            <td>{d.ts2}</td>
            <td>{d.ts1}</td>
            <td>{d.ts}</td>
            <td>{d.jumlah}</td>
          </Then>
          <Else>
            <td>{i + 1}</td>
            <td className="text-left">{d.sumberPembiayaan}</td>
            <td>{d.ts2}</td>
            <td>{d.ts1}</td>
            <td>{d.ts}</td>
            <td>{d.jumlah}</td>
          </Else>
        </If>
      </tr>
    });
    return (
      <>
        <Container>
          <h3 className="text-black font-weight-light my-5 text-center">Tabel 3.b.3 Pengabdian Kepada Masyarakat (PkM) DTPS</h3>
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
                  <th class="align-middle" rowSpan="2">Sumber Pembiayaan</th>
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
                {tabel3_b_3}
              </tbody>
            </Table>
              </Col>
            </Row>
      </div>
        </Container >

      <div>
        <Modal size={'xl'} isOpen={this.state.modal} toggle={this.toggleModal} className={this.props.className}>
          <ModalHeader toggle={this.toggleModal}>Grafik Pengabdian Kepada Masyarakat (PkM) DTPS</ModalHeader>
          <ModalBody>
            <Container>
              <Col md={6} style={{ float: 'left' }}>
                <Chart
                  chartType="BarChart"
                  loader={<div>Loading Chart</div>}
                  data={[
                    ['Sumber Pembiayaan', 'Jumlah per Jenis'],
                    ['Perguruan Tingga dan Mandiri', ts2[0]],
                    ['Lembaga dalam Negeri', ts2[1]],
                    ['Lembaga Luar Negeri', ts2[2]],
                    ['Jumlah', ts2[3]],
                  ]}
                  options={{
                    title: 'Pembiyaan TS-2',
                    chartArea: { width: '53%' },
                    hAxis: {
                      title: 'Data',
                      minValue: 0,
                    },
                  }}
                  rootProps={{ 'data-testid': '1' }}
                />
              </Col>
              <Col md={6} style={{ float: 'left' }}>
                <Chart
                  chartType="BarChart"
                  loader={<div>Loading Chart</div>}
                  data={[
                    ['Sumber Pembiayaan', 'Jumlah per Jenis'],
                    ['Perguruan Tinggi dan Mandiri', ts1[0]],
                    ['Lembaga dalam Negeri', ts1[1]],
                    ['Lembaga Luar Negeri', ts1[2]],
                    ['Jumlah', ts1[3]],
                  ]}
                  options={{
                    title: 'Pembiyaan TS-1',
                    chartArea: { width: '53%' },
                    hAxis: {
                      title: 'Data',
                      minValue: 0,
                    },

                  }}
                  rootProps={{ 'data-testid': '1' }}
                />
              </Col>
              <Col md={6} style={{ float: 'left' }}>
                <Chart
                  chartType="BarChart"
                  loader={<div>Loading Chart</div>}
                  data={[
                    ['Sumber Pembiayaan', 'Jumlah per Jenis'],
                    ['Perguruan Tinggi dan Mandiri', ts[0]],
                    ['Lembaga dalam Negeri', ts[1]],
                    ['Lembaga Luar Negeri', ts[2]],
                    ['Jumlah', ts[3]],
                  ]}
                  options={{
                    title: 'Pembiyaan TS',
                    chartArea: { width: '53%' },
                    hAxis: {
                      title: 'Data',
                      minValue: 0,
                    },
                  }}
                  rootProps={{ 'data-testid': '1' }}
                />
              </Col>
              <Col md={6} style={{ float: 'left' }}>
                <Chart
                  chartType="BarChart"
                  loader={<div>Loading Chart</div>}
                  data={[
                    ['Sumber Pembiayaan', 'Jumlah'],
                    ['Perguruan Tinggi dan Mandiri', jumlah[0]],
                    ['Lembaga dalam Negeri', jumlah[1]],
                    ['Lembaga Luar Negeri', jumlah[2]],
                    ['Jumlah', jumlah[3]],
                  ]}
                  options={{
                    title: 'Jumlah',
                    chartArea: { width: '53%' },
                    hAxis: {
                      title: 'Data',
                      minValue: 0,
                    },
                  }}
                  rootProps={{ 'data-testid': '1' }}
                />
              </Col>
              <Col style={{ float: 'left' }}>
                <Chart
                  chartType="BarChart"
                  loader={<div>Loading Chart</div>}
                  data={[
                    ['Sumber Pembiayaan', 'TS-2', 'TS-1', 'TS', 'Jumlah Total'],
                    ['Perguruan Tinggi dan Mandiri', ts2[0], ts1[0], ts[0], jumlah[0]],
                    ['Lembaga dalam Negeri', ts2[1], ts1[1], ts[1], jumlah[1]],
                    ['Jumlah', ts2[3], ts1[3], ts[3], jumlah[3]],
                  ]}
                  options={{
                    title: 'Perbandingan TS-2, TS-1, TS, dan Jumlah Total',
                    chartArea: { width: '70%' },
                    hAxis: {
                      title: 'Data',
                      minValue: 0,
                    },
                  }}
                  rootProps={{ 'data-testid': '1' }}
                />
              </Col>
            </Container>
          </ModalBody>
        </Modal>
      </div >
      </>
    )
  }
}
Tabel3b3.propTypes = {
}

export default Tabel3b3;