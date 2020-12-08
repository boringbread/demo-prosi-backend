import React, { Component } from 'react';
import { Container } from 'reactstrap';
import { Button, Modal, ModalHeader, ModalBody, ModalFooter } from 'reactstrap';
import { Chart } from "react-google-charts";
import { Table, Col, Row } from 'reactstrap';
import axios from "axios";
import { If, Then, Else, When } from 'react-if';
import './Sarana.css';

class Sarana extends Component {
  constructor(props) {
    super(props);
    this.state = {
      tabel4: [],
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
    axios.get('website-akreditasi-front-end/index.php/api/tabel4').then(data => {
      this.setState({ tabel4: data.data.result });
    })
  }

  render() {
    const { tabel4 } = this.state;
    var TS_2_UPPS = 0;
    var TS_1_UPPS = 0;
    var TS_UPPS = 0;
    var TS_2_PS = 0;
    var TS_1_PS = 0;
    var TS_PS = 0;
    var Rata_rata_UPPS = 0;
    var Rata_rata_PS = 0;

    let tabel_4 = tabel4.map((d, i) => {

      if (d.jenisPenggunaan === "Total") {
        TS_2_UPPS = d.TS_2_UPPS;
        TS_1_UPPS = d.TS_1_UPPS;
        TS_UPPS = d.TS_UPPS;
        TS_1_PS = d.TS_1_PS;
        TS_2_PS = d.TS_2_PS;
        TS_PS = d.TS_PS;
        Rata_rata_PS = d.Rata_rata_PS;
        Rata_rata_UPPS = d.Rata_rata_UPPS;
        console.log(d.TS_2_UPPS.toFixed(2));
      }

      return <tr>
        <If condition={d.jenisPenggunaan === "Jumlah"}>
          <Then>
            <td colSpan="2">{d.jenisPenggunaan}</td>
          </Then>
          <Else>
            <td>{d.Nomor}</td>
            <td className="text-left">{d.jenisPenggunaan}</td>
          </Else>
        </If>
        <If condition={!!d.TS_2_UPPS}>
          <Then>
            <td>{new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format((d.TS_2_UPPS))}</td>
            <td>{new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format((d.TS_1_UPPS))}</td>
            <td>{new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format((d.TS_UPPS))}</td>
            <td>{new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format((d.Rata_rata_UPPS))}</td>
            <td>{new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format((d.TS_2_PS))}</td>
            <td>{new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format((d.TS_1_PS))}</td>
            <td>{new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format((d.TS_PS))}</td>
            <td>{new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format((d.Rata_rata_PS))}</td>
          </Then>
          <Else>
            <td>{d.TS_2_UPPS}</td>
            <td>{d.TS_1_UPPS}</td>
            <td>{d.TS_UPPS}</td>
            <td>{d.Rata_rata_UPPS}</td>
            <td>{d.TS_2_PS}</td>
            <td>{d.TS_1_PS}</td>
            <td>{d.TS_PS}</td>
            <td>{d.Rata_rata_PS}</td>
          </Else>
        </If>
      </tr>
    });
    return (
      <>
        <Container>
          <h3 className="text-black font-weight-light my-5 text-center">Tabel 4 Penggunaan Dana</h3>
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
                <Table striped bordered responsive className="text-center">
                  <thead className="text-center">
                    <tr>
                      <th class="align-middle" rowSpan="2">No.</th>
                      <th class="align-middle" rowSpan="2">Jenis Penggunaan</th>
                      <th class="align-middle" colSpan="4">Unit Pengelola Program Studi (Rp.)</th>
                      <th class="align-middle" colSpan="4">Program Studi (Rp.)</th>
                    </tr>
                    <tr>
                      <th class="align-middle max-width">TS-2</th>
                      <th class="align-middle max-width">TS-1</th>
                      <th class="align-middle max-width">TS</th>
                      <th class="align-middle max-width">Rata-rata</th>
                      <th class="align-middle max-width">TS-2</th>
                      <th class="align-middle max-width">TS-1</th>
                      <th class="align-middle max-width">TS</th>
                      <th class="align-middle max-width">Rata-rata</th>
                    </tr>
                  </thead>
                  <tbody>
                    {tabel_4}
                  </tbody>
                </Table>
              </Col>
            </Row>
          </div>
        </Container>
        <div>
          <Modal size={'xl'} isOpen={this.state.modal} toggle={this.toggleModal} className={this.props.className}>
            <ModalHeader toggle={this.toggleModal}>Grafik Penggunaan Dana</ModalHeader>
            <ModalBody>
              <Container>
                <Col md={12} style={{ float: 'left' }}>
                  <Chart
                    chartType="BarChart"
                    loader={<div>Loading Chart</div>}
                    data={[
                      ['Sumber Pembiayaan', 'Jumlah Dana'],
                      ['TS-2', TS_2_UPPS],
                      ['TS-1', TS_1_UPPS],
                      ['TS', TS_UPPS],
                      ['Rata-rata', Rata_rata_UPPS],
                    ]}
                    options={{
                      title: 'Jumlah Dana UPPS',
                      chartArea: { width: '75%' },
                      hAxis: {
                        title: 'Data',
                        minValue: 0,
                      },
                    }}
                    rootProps={{ 'data-testid': '1' }}
                  />
                </Col>
                <Col md={12} style={{ float: 'left' }}>
                  <Chart
                    chartType="BarChart"
                    loader={<div>Loading Chart</div>}
                    data={[
                      ['Sumber Pembiayaan', 'Jumlah Dana'],
                      ['TS-2', TS_2_PS],
                      ['TS-1', TS_1_PS],
                      ['TS', TS_PS],
                      ['Rata-rata', Rata_rata_PS],
                    ]}
                    options={{
                      title: 'Jumlah Dana PS',
                      chartArea: { width: '75%' },
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
Sarana.propTypes = {
}

export default Sarana;