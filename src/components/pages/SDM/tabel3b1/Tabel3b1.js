import React, { Component } from 'react';
import { Table } from 'reactstrap';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faCheck } from '@fortawesome/free-solid-svg-icons'
import { Container, Row, Col } from 'reactstrap';
import axios from "axios";
import { When } from 'react-if';
import './Tabel3b1.css';

class Tabel3b1 extends Component {
  constructor(props) {
    super(props);
    this.state = {
      tabel3b1: [],
    };
  }

  componentDidMount() {
    axios.get('website-akreditasi-front-end/index.php/api/tabel3b1').then(data => {
      this.setState({ tabel3b1: data.data.result });
    })
  }

  render() {
    var wilayah = 0;
    var nasional = 0;
    var internasional = 0;
    const { tabel3b1 } = this.state;
    let tabel3_b_1 = tabel3b1.map((d, i) => {
      if (d.Wilayah == "V") {
        wilayah += 1;
      }
      if (d.Nasional == "V") {
        nasional += 1;
      }
      if (d.Internasional == "V") {
        internasional += 1;
      }
      return <tr>
        <td>{d.Nomor}</td>
        <td>{d.NamaDosen}</td>
        <td>{d["Bidang Keahlian"]}</td>
        <td>{d.Rekognisi}</td>
        <td>
          <When condition={d.Wilayah == "V"}>
            <FontAwesomeIcon icon={faCheck} />
          </When>
        </td>
        <td>
          <When condition={d.Nasional == "V"}>
            <FontAwesomeIcon icon={faCheck} />
          </When>
        </td>
        <td>
          <When condition={d.Internasional == "V"}>
            <FontAwesomeIcon icon={faCheck} />
          </When>
        </td>
        <td>{d.Tahun}</td>
      </tr>
    });
    return (
      <>
        <Container>
          <h3 className="text-black font-weight-light my-5 text-center">Tabel 3.b.1 Pengakuan/Rekognisi DTPS</h3>
        </Container>
        <Container fluid="true">
          <div className="px-4">
            <Row>
              <Col>
                <Table striped bordered responsive className="text-center">
                  <thead>
                    <tr>
                      <th class="align-middle" rowSpan="2">No.</th>
                      <th class="align-middle" rowSpan="2">Nama Dosen</th>
                      <th class="align-middle" rowSpan="2">Bidang Keahlian</th>
                      <th class="align-middle" rowSpan="2">Rekognisi dan Bukti Pendukung</th>
                      <th class="align-middle" colSpan="3">Tingkat</th>
                      <th class="align-middle" rowSpan="2">Tahun</th>
                    </tr>
                    <tr>
                      <th class="align-middle">Wilayah</th>
                      <th class="align-middle">Nasional</th>
                      <th class="align-middle">Internasional</th>
                    </tr>
                  </thead>
                  <tbody>
                    {tabel3_b_1}
                    <tr>
                      <td colSpan="4">Jumlah</td>
                      <td>{wilayah}</td>
                      <td>{nasional}</td>
                      <td>{internasional}</td>
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
Tabel3b1.propTypes = {
}

export default Tabel3b1;