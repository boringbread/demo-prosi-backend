import React, { Component } from 'react';
import { Table } from 'reactstrap';
import { Container, Col, Row } from 'reactstrap';
import axios from "axios";
import { Input, FormGroup } from 'reactstrap';
import './Tabel3b5.css';

class Tabel3b5 extends Component {
  constructor(props) {
    super(props);
    this.state = {
      tabel3b5: [],
      tabel3b5Filtered: [],
    };
  }
  componentDidMount() {
    axios.get('website-akreditasi-front-end/index.php/api/tabel3b5').then(data => {
      this.setState({ tabel3b5: data.data.result, tabel3b5Filtered: data.data.result });
    })
  }

  update(e) {
    var x = this.state.tabel3a;
    let searchQuery = e.target.value;
    let regexer = new RegExp(searchQuery, "i");
    this.setState({
      tabel3b5Filtered: this.state.tabel3b5.filter(d => searchQuery.length == 0 || d.NamaDosen.match(regexer))
    });
  }

  render() {
    var jumlah = 0;
    const { tabel3b5, tabel3b5Filtered } = this.state;
    let tabel3_b_5 = tabel3b5Filtered.map((d, i) => {
      jumlah += d.JumlahSitasi;
      return <tr>
        <td style={{ width: 10 }}>{i + 1}</td>
        <td style={{ textAlign: 'left', width: 1 }}>{d.NamaDosen}</td>
        <td style={{ textAlign: "left" }}>{d.JudulArtikel}</td>
        <td style={{ width: 10 }}>{d.JumlahSitasi}</td>
      </tr>
    });
    return (
      <>
        <Container>
          <h3 className="text-black font-weight-light my-5 text-center">Tabel 3.b.6 Karya ilmiah DTPS yang disitasi dalam 3 tahun terakhir</h3>
        </Container>
        <Container fluid>
          <div className="px-4">
            <Row>
              <Col>
                <Col md={3} className="go-right input">
                  <FormGroup className="input">
                    <Input type="text" onChange={this.update.bind(this)} placeholder="Cari Dosen" />
                  </FormGroup>
                </Col>
                <Table striped responsive bordered className="text-center">
                  <thead>
                    <tr>
                      <th style={{ width: 10 }} class="align-middle">No.</th>
                      <th style={{ width: 10 }} class="align-middle">Nama Dosen</th>
                      <th style={{ width: 190 }} class="align-middle max-width">Judul Artikel yang Disitasi (Jurnal/Buku, Volume, Tahun, Nomor, Halaman)</th>
                      <th style={{ width: 10 }} class="align-middle">Jumlah Sitasi</th>
                    </tr>
                  </thead>
                  <tbody>
                    {tabel3_b_5}
                    <tr>
                      <td colSpan="2">Jumlah</td>
                      <td>{tabel3_b_5.length}</td>
                      <td>{jumlah}</td>
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
Tabel3b5.propTypes = {
}

export default Tabel3b5;