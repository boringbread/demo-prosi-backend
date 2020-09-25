import React, { Component } from 'react';
import { Table } from 'reactstrap';
import { Container, Col, Row } from 'reactstrap';
import axios from "axios";
import { If, Then, Else } from 'react-if';
import './Tabel3b7.css';

class Tabel3b7 extends Component {
  constructor(props) {
    super(props);
    this.state = {
      tabel3b7: [],
    };
  }
  componentDidMount() {
    axios.get('website-akreditasi-front-end/index.php/api/tabel3b7').then(data => {
      this.setState({ tabel3b7: data.data.result });
    })
  }
  render() {
    const { tabel3b7 } = this.state;
    let tabel3_b_7 = tabel3b7.map((d, i) => <tr>
      <If condition={d.JudulLuaran === "Jumlah"}>
        <Then>
          <td colSpan="2">{d.JudulLuaran}</td>
        </Then>
        <Else>
          <td>{d.Nomor}</td>
          <td className="text-left">{d.JudulLuaran}</td>
        </Else>
      </If>
      <td>{d.tahun}</td>
      <td>{d.keterangan}</td>
    </tr>);
    return (
      <>
        <Container>
          <h3 className="text-black font-weight-light my-5 text-center">Tabel 3.b.5 Luaran Penelitian/PkM Lainnya oleh DTPS</h3>
        </Container>
        <Container fluid>
          <div className="px-4">
            <Row>
              <Col>
                <Table striped responsive bordered className="text-center">
                  <thead>
                    <tr>
                      <th class="align-middle">No.</th>
                      <th class="align-middle">Judul Luaran Penelitian/PkM</th>
                      <th class="align-middle">Tahun</th>
                      <th class="align-middle">Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    {tabel3_b_7}
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
Tabel3b7.propTypes = {
}

export default Tabel3b7;