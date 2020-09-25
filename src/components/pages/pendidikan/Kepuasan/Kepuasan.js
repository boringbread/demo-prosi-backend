import React, { Component } from 'react';
import { Table } from 'reactstrap';
import { Container, Col, Row } from 'reactstrap';
import axios from "axios"; import './Kepuasan.css';

class Kepuasan extends Component {
  constructor(props) {
    super(props);
  }
  render() {
    return (
      <>
        <Container>
          <h3 className="text-black font-weight-light my-5 text-center">Tabel 5.c Kepuasan Mahasiswa</h3>
        </Container>
        <Container fluid>
          <div className="px-4">
            <Row>
              <Col>
                <Table striped bordered responsive className="text-center">
                  <thead>
                    <tr>
                      <th class="align-middle" rowSpan="2">No.</th>
                      <th class="align-middle" rowSpan="2">Aspek yang Diukur</th>
                      <th class="align-middle" colSpan="4">Tingkat Kepuasan Mahasiswa (%)</th>
                      <th class="align-middle" rowSpan="2">Rencana Tidak Lanjut oleh UPPS/PS</th>
                    </tr>
                    <tr>
                      <th class="align-middle">Sangat Baik</th>
                      <th class="align-middle">Baik</th>
                      <th class="align-middle">Cukup</th>
                      <th class="align-middle">Kurang</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Keandalan (reliability): kemampuan dosen, tenaga kependidikan, dan pengelola dalam memberikan pelayanan.</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Daya tanggap (responsiveness): kemauan dari dosen, tenaga kependidikan, dan pengelola dalam membantu mahasiswa dan memberikan jasa dengan cepat.</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Kepastian (assurance): kemampuan dosen, tenaga kependidikan, dan pengelola untuk memberi keyakinankepada mahasiswa bahwa pelayanan yang diberikan telah sesuai dengan ketentuan.</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Empati (empathy): kesediaan/kepedulian dosen, tenaga kependidikan, dan pengelola untuk memberi perhatian kepada mahasiswa</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Tangible: penilaian mahasiswa terhadap kecukupan, aksesibitas, kualitas sarana dan prasarana</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td colSpan="2">Jumlah</td>
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
Kepuasan.propTypes = {
}

export default Kepuasan;