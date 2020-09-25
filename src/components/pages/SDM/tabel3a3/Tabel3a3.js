import React, { Component } from 'react';
import { Table, Col, Row } from 'reactstrap';
import { Container } from 'reactstrap';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faCheck } from '@fortawesome/free-solid-svg-icons'
import { Button, Modal, ModalHeader, ModalBody, ModalFooter } from 'reactstrap';
import { Chart } from "react-google-charts";
import axios from "axios";
import { Input, FormGroup } from 'reactstrap';
import { When } from 'react-if';

class Tabel3a3 extends Component {
  constructor(props) {
    super(props);
    this.toggleModal = this.toggleModal.bind(this);

    this.state = {
      tabel3a3: [],
      tabel3a3Filtered: [],
      modal: false,
    }
    this.toggleModal = this.toggleModal.bind(this);
  }

  toggleModal() {
    this.setState(prevState => ({
      modal: !prevState.modal
    }));
    if (this.state.modal == true) {
      this.setState({ modal: false });
    } else {
      this.setState({ modal: true });
    }
  }
  componentDidMount() {
    axios.get('website-akreditasi-front-end/index.php/api/tabel3a3').then(data => {
      this.setState({ tabel3a3: data.data.result, tabel3a3Filtered: data.data.result });
    })
  }

  update(e) {
    var x = this.state.tabel3a;
    let searchQuery = e.target.value;
    let regexer = new RegExp(searchQuery, "i");
    this.setState({
      tabel3a3Filtered: this.state.tabel3a3.filter(d => searchQuery.length == 0 || d.Nama.match(regexer))
    });
  }

  render() {
    var dt = 0;
    var dtps = 0;
    var jumlahSKSDT = 0;
    var meanDT = 0;
    var meanDTPS = 0;
    var jumlahSKSDTPS = 0;
    var dosen = [];
    var rata2 = [];
    const { tabel3a3, tabel3a3Filtered } = this.state;
    let tabel3_a_3 = tabel3a3Filtered.map((d, i) => {
      dt = dt + 1;
      meanDT += d.Rata2;
      dosen[i] = d.Nama;
      rata2[i] = d.Rata2;
      jumlahSKSDT = jumlahSKSDT + d.Jumlah;
      if (d.isDTPS == "1") {
        dtps = dtps + 1;
        meanDTPS += d.Rata2;
        jumlahSKSDTPS = jumlahSKSDTPS + d.Jumlah;
      }

      return <tr>
        <td>{i + 1}</td>
        <td style={{ textAlign: 'left', width: 190 }}>{d.Nama}</td>
        <td>
          <When condition={d.isDTPS == "1"}>
            <FontAwesomeIcon icon={faCheck} />
          </When>
        </td>
        <td>{d.PembelajaranPS}</td>
        <td>{d.PembelajaranPSLain}</td>
        <td>{d.PembelajaranPSLuar}</td>
        <td>{d.Penelitian}</td>
        <td>{d.Pkm}</td>
        <td>{d.Tambahan}</td>
        <td>{d.Jumlah}</td>
        <td>{d.Rata2}</td>
      </tr>
    });
    console.log(jumlahSKSDT);
    console.log(jumlahSKSDTPS);
    return (
      <>
        <Container>
          <h3 className="text-black font-weight-light my-5 text-center">Tabel 3.a.2  Ekuivalen Waktu Mengajar Penuh (EWMP) Dosen Tetap Perguruan Tinggi</h3>
        </Container>
        <Container fluid>
          <div className="px-4">
            <Row className="mb-2">
              <Col className="mb-1">
                <Button color="primary" className="grafik" onClick={() => {
                  this.setState({
                    modal: true
                  });
                }}>Grafik</Button>
              </Col>
              <Col md={3} className="ml-auto">
                <Input type="text" onChange={this.update.bind(this)} placeholder="Cari Dosen" />
              </Col>
            </Row>
            <Row>
              <Col>
                <Table striped bordered responsive className="text-center">
                  <thead>
                    <tr>
                      <th className="align-middle" rowSpan="3">No.</th>
                      <th className="align-middle" rowSpan="3">Nama Dosen</th>
                      <th className="align-middle" rowSpan="3">DTPS</th>
                      <th className="align-middle" colSpan="6">Ekuivalen Waktu Mengajar Penuh (EWMP) pada saat TS dalam satuan kredit semester (sks)</th>
                      <th className="align-middle" rowSpan="3">Jumlah (sks)</th>
                      <th className="align-middle" rowSpan="3">Rata-rata per Semester (sks)</th>
                    </tr>
                    <tr>
                      <th className="align-middle" colSpan="3">Pendidikan: <br></br>Pembelajaran dan Pembimbingan</th>
                      <th className="align-middle" rowSpan="2">Penelitian</th>
                      <th className="align-middle" rowSpan="2">PkM</th>
                      <th className="align-middle" rowSpan="2">Tugas Tambahan dan/atau Penunjang</th>
                    </tr>
                    <tr>
                      <th className="align-middle">PS yang Diakreditasi</th>
                      <th className="align-middle">PS Lain di dalam PT</th>
                      <th className="align-middle">PS Lain di luar PT</th>
                    </tr>
                  </thead>
                  <tbody>
                    {tabel3_a_3}
                    <tr>
                      <td colSpan="9">Rata-rata DT</td>
                      <td>{(jumlahSKSDT / dt).toFixed(2)}</td>
                      <td>{(meanDT / dt).toFixed(2)}</td>
                    </tr>
                    <tr>
                      <td colSpan="9">Rata-rata DTPS</td>
                      <td>{(jumlahSKSDTPS / dtps).toFixed(2)}</td>
                      <td>{(meanDTPS / dtps).toFixed(2)}</td>
                    </tr>
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
                    height={'700px'}
                    chartType="BarChart"
                    loader={<div>Loading Chart</div>}
                    data={[
                      ['Ekuivalen Waktu Mengajar Penuh', 'Jumlah SKS'],
                      [dosen[0], rata2[0]],
                      [dosen[1], rata2[1]],
                      [dosen[2], rata2[2]],
                      [dosen[3], rata2[3]],
                      [dosen[4], rata2[4]],
                      [dosen[5], rata2[5]],
                      [dosen[6], rata2[6]],
                      [dosen[7], rata2[7]],
                      [dosen[8], rata2[8]],
                      [dosen[9], rata2[9]],
                      [dosen[10], rata2[10]],
                      [dosen[11], rata2[11]],
                      [dosen[12], rata2[12]],
                      [dosen[13], rata2[13]],
                      [dosen[14], rata2[14]],
                      [dosen[15], rata2[15]],
                    ]}
                    options={{
                      title: 'Rata-rata Jumlah SKS yang Diajar oleh Dosen Tetap Perguruan Tinggi per Semester',
                      chartArea: { width: '45%' },
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
                      ['Ekuivalen Waktu Mengajar Penuh', 'Jumlah SKS'],
                      ['Dosen Tetap(DT)', meanDT / dt],
                      ['Dosen Tetap Program Studi(DTPS)', meanDTPS / dtps],
                    ]}
                    options={{
                      title: 'Perbandingan Rata-rata Jumlah SKS yang Diajar oleh Dosen Tetap dan Dosen Tetap Program Studi Perguruan Tinggi per Semester',
                      chartArea: { width: '45%' },
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
Tabel3a3.propTypes = {
}

export default Tabel3a3;