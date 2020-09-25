import React, { Component } from 'react';
import { Table } from 'reactstrap';
import { Container, Col } from 'reactstrap';
import { Input, FormGroup } from 'reactstrap';
import axios from "axios";
import './Tabel8f2.css';

class Tabel8f2 extends Component {
  constructor(props) {
    super(props);
    this.state = {
      tabel8f2: [],
      tabel8f2Filtered: [],
    }
  }

  componentDidMount() {
    axios.get('website-akreditasi-front-end/index.php/api/tabel8f2a').then(data => {
      this.setState({ tabel8f2: data.data.result, tabel8f2Filtered: data.data.result });
    })
  }

  update(e) {
    var x = this.state.tabel3a;
    let searchQuery = e.target.value;
    let regexer = new RegExp(searchQuery, "i");
    this.setState({
      tabel8f2Filtered: this.state.tabel8f2.filter(d => searchQuery.length == 0 || d.namaDosen.match(regexer))
    });
  }

  render() {
    const { tabel8f2Filtered } = this.state;
    let tabel8_f_2 = tabel8f2Filtered.map((d, i) => {
      return <tr>
        <td style={{ width: 20 }}>{i + 1}</td>
        <td style={{ textAlign: 'left', width: 350 }}>{d.namaDosen}</td>
        <td style={{ textAlign: 'left', width: 100 }}>{d.judulArtikel}</td>
        <td style={{ width: 30 }}>{d.jumlahSitasi}</td>
      </tr>
    });
    return (
      <>
        <div>
          <h3 className="text-black font-weight-light my-5 text-center">Tabel 8.f.2 Karya ilmiah mahasiswa yang disitasi</h3>
        </div>
        <div className="cont_limit">
          <Container fluid={true}>
            <Col md={3} className="go-right input">
              <FormGroup className="input">
                <Input type="text" onChange={this.update.bind(this)} placeholder="Cari Dosen" />
              </FormGroup>
            </Col>
            <Table striped bordered className="text-center">
              <thead>
                <tr>
                  <th className="align-middle">No.</th>
                  <th className="align-middle">Nama Mahasiswa</th>
                  <th className="align-middle">Judul Artikel yang Disitasi (Jurnal/Buku, Volume, Tahun, Nomor, Halaman) </th>
                  <th className="align-middle">Jumlah Sitasi</th>
                </tr>
              </thead>
              <tbody>
                {tabel8_f_2}
              </tbody>
            </Table>
          </Container>
        </div>
      </>
    )
  }
}
Tabel8f2.propTypes = {
}

export default Tabel8f2;