import React, { Component } from 'react';
import { Table, Col, Row } from 'reactstrap';
import { Container } from 'reactstrap';
import { Button, Modal, ModalHeader, ModalBody, ModalFooter } from 'reactstrap';
import { Chart } from "react-google-charts";
import axios from "axios";
import { Input, FormGroup } from 'reactstrap';
import './Tabel3a2.css';

class Tabel3a2 extends Component {
  constructor(props) {
    super(props);
    this.toggleModal = this.toggleModal.bind(this);
    this.state = {
      tabel3a2: [],
      tabel3a2Filtered: [],
      modal: false,
    };
  }

  toggleModal() {
    this.setState(prevState => ({
      modal: !prevState.modal
    }));
  }

  componentDidMount() {
    axios.get('website-akreditasi-front-end/index.php/api/tabel3a2').then(data => {
      this.setState({ tabel3a2: data.data.result, tabel3a2Filtered: data.data.result });
    })
    console.log(this.state.tabel3a2);
  }

  update(e) {
    console.log(e.target.value);
    var x = this.state.tabel3a;
    let searchQuery = e.target.value;
    let regexer = new RegExp(searchQuery, "i");
    console.log(regexer);
    this.setState({
      tabel3a2Filtered: this.state.tabel3a2.filter(d => searchQuery.length == 0 || d.NamaDosen.match(regexer))
    });
  }


  render() {
    const { tabel3a2, tabel3a2Filtered } = this.state;
    let dtps = 0;
    let jumlah = 0;
    let jumlahdtps = 0;
    var dosen = [];
    var rata2 = [];
    var rata2jumlah = [];
    var dataFinal;
    let tabel3_a_2 = tabel3a2Filtered.map((d, i) => {
      jumlah += d.Jumlah;
      if (d.isDTPS == '1') {
        dtps++;
        jumlahdtps += d.Jumlah;
      }
      dosen[i] = d.NamaDosen;
      rata2[i] = d.Rata2;
      rata2jumlah[i] = d.Rata2_semua;
      return <tr>
      <td style={{ width: '2%' }}>{d.Nomor}</td>
      <td style={{ textAlign: 'left', width: 190 }}>{d.NamaDosen}</td>
      <td>{d['TS-2']}</td>
      <td>{d['TS-1']}</td>
      <td>{d.TS}</td>
      <td>{d.Rata2.toFixed(2)}</td>
      <td>{d['TS-2b']}</td>
      <td>{d['TS-1b']}</td>
      <td>{d.TSb}</td>
      <td>{d.Rata2b}</td>
      <td>{d.Rata2_semua.toFixed(2)}</td>
      </tr>
    });


    return (
      <>
      <Container>
      <h3 className="text-black font-weight-light my-5 text-center">Tabel 3.a.4 Dosen Pembimbing Utama Tugas Akhir</h3>
      </Container>
      <Container fluid={true}>
      <div className="px-4">
      <Row className="pb-3">
      <Col className="mb-2">
      <Button color="primary" onClick={() => {
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
      <Table striped responsive bordered className="text-center">
      <thead>
      <tr>
      <th className="align-middle" rowSpan="3">No.</th>
      <th className="align-middle" rowSpan="3">Nama Dosen</th>
      <th className="align-middle" colSpan="8">Jumlah Mahasiswa yang Dibimbing</th>
      <th className="temp align-middle" rowSpan="3" >Rata-rata Jumlah Bimbingan di semua Program/ Semester</th>
      </tr>
      <tr>
      <th className="align-middle" colSpan="4">pada PS yang Diakreditasi</th>
      <th className="align-middle" colSpan="4">pada PS Lain di PT</th>
      </tr>
      <tr>
      <th className="align-middle">TS-2</th>
      <th className="align-middle">TS-1</th>
      <th className="align-middle">TS</th>
      <th className="align-middle">Rata-rata</th>
      <th className="align-middle">TS-2</th>
      <th className="align-middle">TS-1</th>
      <th className="align-middle">TS</th>
      <th className="align-middle">Rata-rata</th>
      </tr>
      </thead>
      <tbody>
      {tabel3_a_2}
      </tbody>
      </Table>
      </Col>
      </Row>
      </div>
      </Container>

      <div>
      <Modal size={'xl'} isOpen={this.state.modal} toggle={this.toggleModal} className={this.props.className}>
      <ModalHeader toggle={this.toggleModal}>Grafik Dosen Pembimbing Utama Tugas Akhir</ModalHeader>
      <ModalBody>
      <Container>
      <Col md={12} style={{ float: 'left' }}>
      <Chart
      height={'450px'}
      chartType="BarChart"
      loader={<div>Loading Chart</div>}
      data={[
        ['Dosen Pembimbing', 'Jumlah Tugas Akhir'],
        [dosen[0], rata2[0]],
        [dosen[1], rata2[1]],
        [dosen[2], rata2[2]],
        [dosen[3], rata2[3]],
        [dosen[4], rata2[4]],
        [dosen[5], rata2[5]],
        [dosen[6], rata2[6]],
        [dosen[7], rata2[7]],
        [dosen[8], rata2[8]],
        ]}
        options={{
          title: 'Rata-rata Jumlah Mahasiswa yang Dibimbing pada PS yang Diakreditasi',
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
        height={'450px'}
        chartType="BarChart"
        loader={<div>Loading Chart</div>}
        data={[
          ['Dosen Pembimbing', 'Jumlah Tugas Akhir'],
          [dosen[0], rata2jumlah[0]],
          [dosen[1], rata2jumlah[1]],
          [dosen[2], rata2jumlah[2]],
          [dosen[3], rata2jumlah[3]],
          [dosen[4], rata2jumlah[4]],
          [dosen[5], rata2jumlah[5]],
          [dosen[6], rata2jumlah[6]],
          [dosen[7], rata2jumlah[7]],
          [dosen[8], rata2jumlah[8]],
          ]}
          options={{
            title: 'Rata-rata Jumlah Bimbingan di semua Program/Semester',
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
Tabel3a2.propTypes = {
}

export default Tabel3a2;