import React, { Component } from 'react';
import { Table, Col, Row } from 'reactstrap';
import { Button, Modal, ModalHeader, ModalBody, ModalFooter } from 'reactstrap';
import { Chart } from "react-google-charts";
import { Container } from 'reactstrap';
import axios from "axios";
import { Input, FormGroup } from 'reactstrap';
import './PengabdianMasyarakat.css';

class PengabdianMasyarakat extends Component {
  constructor(props) {
    super(props);
    this.state = {
      tabel7: [],
      tabel7Filtered: [],
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
    axios.get('website-akreditasi-front-end/index.php/api/tabel7').then(data => {
      this.setState({ tabel7: data.data.result, tabel7Filtered: data.data.result });
    })
  }

  update(e) {
    var x = this.state.tabel3a;
    let searchQuery = e.target.value;
    let regexer = new RegExp(searchQuery, "i");
    this.setState({
      tabel7Filtered: this.state.tabel7.filter(d => searchQuery.length == 0 || d.namaDosen.match(regexer))
    });
  }


  render() {
    const { tabel7, tabel7Filtered } = this.state;
    let jml2016 = 0;
    let jml2017 = 0;
    let jml2018 = 0;
    let jml2019 = 0;
    let jml2020 = 0;
    let tabel = tabel7Filtered.map((d, i) => {
      if (d.tahun.substr(0, 4) == "2016") {
        jml2016++;
      } else if (d.tahun.substr(0, 4) == "2017") {
        jml2017++;
      } else if (d.tahun.substr(0, 4) == "2018") {
        jml2018++;
      } else if (d.tahun.substr(0, 4) == "2019") {
        jml2019++;
      } else {
        jml2020++;
      }

      return <tr>
        <td style={{ width: 20 }}>{i + 1}</td>
        <td style={{ textAlign: 'left', width: 350 }}>{d.namaDosen}</td>
        <td style={{ width: 100 }}>{d.temaPKM}</td>
        <td style={{ textAlign: 'left', width: 250 }}>{d.namaMahasiswa}</td>
        <td style={{ textAlign: 'left', width: 100 }}>{d.judulKegiatan}</td>
        <td style={{ width: 35 }}>{d.tahun}</td>
      </tr>
    });

    return (
      <>
        <Container>
          <h3 className="text-black font-weight-light my-5 text-center">Tabel 7 PkM DTPS yang melibatkan mahasiswa </h3>
        </Container>
        <Container fluid="true">
          <div className="px-4">
            <Row>
              <Col className="mb-1">
                <Button color="primary" className="grafik" onClick={() => {
                  this.setState({
                    modal: true
                  });
                }}>Grafik</Button>
              </Col>
              <Col md={3} className="ml-auto">
                <FormGroup className="input">
                  <Input type="text" onChange={this.update.bind(this)} placeholder="Cari Dosen" />
                </FormGroup>
              </Col>
            </Row>
            <Row>
              <Col>
                <Table striped bordered responsive className="text-center">
                  <thead>
                    <tr>
                      <th className="align-middle">No.</th>
                      <th className="align-middle">Nama Dosen</th>
                      <th className="align-middle">Tema PkM Sesuai Roadmap</th>
                      <th className="align-middle">Nama Mahasiswa</th>
                      <th className="align-middle">Judul Kegiatan</th>
                      <th className="align-middle">Tahun</th>
                    </tr>
                  </thead>
                  <tbody>
                    {tabel}
                    <tr>
                      <td colSpan="5">Jumlah</td>
                      <td>{tabel.length}</td>
                    </tr>
                  </tbody>
                </Table>
              </Col>
            </Row>
          </div>
        </Container>

        <div>
          <Modal size={'xl'} isOpen={this.state.modal} toggle={this.toggleModal} className={this.props.className}>
            <ModalHeader toggle={this.toggleModal}>Grafik Tahun PkM DTPS yang Melibatkan Mahasiswa</ModalHeader>
            <ModalBody>
              <Container>
                <Col md={12} style={{ float: 'left' }}>
                  <Chart
                    width={'1000px'}
                    height={'450px'}
                    chartType="PieChart"
                    loader={<div>Loading Chart</div>}
                    data={[
                      ['Tahun', 'Jumlah'],
                      ['2016', jml2016],
                      ['2017', jml2017],
                      ['2018', jml2018],
                      ['2019', jml2019],
                      ['2020', jml2020],
                    ]}
                    options={{
                      title: 'PkM DTPS yang Melibatkan Mahasiswa',
                      is3D: false,
                    }}
                    rootProps={{ 'data-testid': '2' }}
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
PengabdianMasyarakat.propTypes = {
}

export default PengabdianMasyarakat;