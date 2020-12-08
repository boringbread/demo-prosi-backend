import React, { Component } from 'react';
import { Table } from 'reactstrap';
import { Container, Col, Row } from 'reactstrap';
import axios from "axios";
import { Input, FormGroup } from 'reactstrap';
import './Kurikulum.css';

class Kurikulum extends Component {
  constructor(props) {
    super(props);
    this.state = {
      name: ""
    };
  }

  update(e) {
    this.setState({ name: e.target.value });
    console.log(this.state.name);
  }

  render() {
    return (
      <>
        <Container className="Penelitian">
          <h3 className="text-black font-weight-light my-5 text-center">Tabel 5.a Kurikulum, Capaian Pembelajaran, dan Rencana Pembelajaran</h3>
        </Container>

        <Container fluid>
          <div className="px-4">
            <Row>
              <Col md={3} className="ml-auto">
                <FormGroup className="input">
                  <Input type="text" onChange={this.update.bind(this)} placeholder="Cari Dosen" />
                  {this.state.name}
                </FormGroup>
              </Col>
            </Row>
            <Row>
              <Col>
                <Table striped bordered responsive className="text-center table-font">
                  <thead>
                    <tr>
                      <th className="align-middle" rowSpan="2">No.</th>
                      <th className="align-middle" rowSpan="2">Semester</th>
                      <th className="align-middle" roswSpan="2">Kode Mata Kuliah</th>
                      <th className="align-middle" rowSpan="2">Nama Mata Kuliah</th>
                      <th className="align-middle" rowSpan="2">Mata Kuliah Kompetensi</th>
                      <th className="align-middle" colSpan="3">Bobot Kredit (sks)</th>
                      <th className="align-middle" rowSpan="2">Konversi Kredit ke Jam</th>
                      <th className="align-middle" colSpan="4">Capaian Pembelajaran</th>
                      <th className="align-middle" rowSpan="2">Dokumen Rencana Pembelajaran</th>
                      <th className="align-middle" rowSpan="2">Unit Penyelengara</th>
                    </tr>
                    <tr>
                      <th className="align-middle">Kuliah/Responsi/Tutorial</th>
                      <th className="align-middle">Seminar</th>
                      <th className="align-middle">Praktikum/Praktik/Praktik Lapangan</th>
                      <th className="align-middle">Sikap</th>
                      <th className="align-middle">Pengetahuan</th>
                      <th className="align-middle">Keterampilan Umum</th>
                      <th className="align-middle">Keterampilan Khusus</th>
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
                      <td></td>
                      <td></td>
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
                      <td></td>
                      <td></td>
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
                      <td></td>
                      <td></td>
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
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td colSpan="4">Jumlah</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                </Table>
              </Col>
            </Row>
          </div>
        </Container>
      </>
    )
  }
}
Kurikulum.propTypes = {
}

export default Kurikulum;