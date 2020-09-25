import React, { Component } from 'react';
import { Table } from 'reactstrap';
import { Container, Col, Row } from 'reactstrap';
import axios from "axios";
import { Input, FormGroup } from 'reactstrap';
import './Penelitian.css';

class Penelitian extends Component {
  constructor(props) {
    super(props);
    this.state = {
      tabel5b: [],
      tabel5bFiltered: [],
    };
  }

  componentDidMount() {
    axios.get('website-akreditasi-front-end/index.php/api/tabel5b').then(data => {
      this.setState({ tabel5b: data.data.result, tabel5bFiltered: data.data.result });
    })
  }

  update(e) {
    var x = this.state.tabel3a;
    let searchQuery = e.target.value;
    let regexer = new RegExp(searchQuery, "i");
    this.setState({
      tabel5bFiltered: this.state.tabel5b.filter(d => searchQuery.length == 0 || d.dosen.match(regexer))
    });
  }

  render() {
    const { tabel5b, tabel5bFiltered } = this.state;
    let tabel_5_b = tabel5bFiltered.map((d, i) => <tr>
      <td>{i + 1}</td>
      <td>{d.judul}</td>
      <td>{d.dosen}</td>
      <td>{d.namaMatakuliah}</td>
      <td>{d.bentukIntegrasi}</td>
    </tr>);
    return (
      <>
        <Container>
          <h3 className="text-black font-weight-light my-5 text-center">Tabel 5.b Integrasi Kegiatan Penelitian/PkM dalam Pembelajaran </h3>
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

                <Table striped bordered responsive className="text-center">
                  <thead>
                    <tr>
                      <th class="align-middle">No.</th>
                      <th class="align-middle">Judul Penelitian/PkM</th>
                      <th class="align-middle">Nama Dosen</th>
                      <th class="align-middle">Mata Kuliah</th>
                      <th class="align-middle">Bentuk Integrasi</th>
                    </tr>
                  </thead>
                  <tbody>
                    {tabel_5_b}
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
Penelitian.propTypes = {
}

export default Penelitian;