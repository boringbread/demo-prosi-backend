import React, { Component, useState, useEffect } from "react";
import { Table, Col, Row } from "reactstrap";
import { Button, Modal, ModalHeader, ModalBody, ModalFooter } from "reactstrap";
import { Chart } from "react-google-charts";
import { Container } from "reactstrap";
import "./PengabdianMasyarakat.css";
import { Input, FormGroup } from "reactstrap";
import axios from "axios";
import DragDrop from "../TarikBuang";

function PengabdianMasyarakat (props) {
  const [state,setState] = useState({
  // constructor(props) {
  //   super(props);
  //   this.state = {
      tabel7a: [],
      tabel7: [],
      tabelBukti7a: [],
      modal: false,
      dad: false,
      modalBukti: false,
      unggahBukti: false,
    // };
  })
    // this.toggleModal = this.toggleModal.bind(this);
    // this.toggleModalBukti = this.toggleModalBukti.bind(this);
    // this.toggleModalUnggahBukti = this.toggleModalUnggahBukti.bind(this);
  // }

  const updateA = (e) => {
     var x = state.tabel3a;
    // var x = this.state.tabel3a;
    let searchQuery = e.target.value;
    let regexer = new RegExp(searchQuery, "i");
    setState({
    ...state,
    // this.setState({
      tabel7: this.state.tabel7a.filter(
        (d) => searchQuery.length == 0 || d.namaDosen.match(regexer)
      ),
    });
  }

  const reducer = (state, action) => {
    switch (action.type) {
      case "SET_DROP_DEPTH":
        return { ...state, dropDepth: action.dropDepth };
      case "SET_IN_DROP_ZONE":
        return { ...state, inDropZone: action.inDropZone };
      case "ADD_FILE_TO_LIST":
        return { ...state, fileList: state.fileList.concat(action.files) };
      default:
        return state;
    }
  };

  const [data, dispatch] = React.useReducer(reducer, {
    dropDepth: 0,
    inDropZone: false,
    fileList: [],
  });

  const toggleModal = () => {
    // if (this.state.modal == true) {
    //   this.setState({ modal: false });
    // } else {
    //   this.setState({ modal: true });
    // }
    if (state.modal == true) {
      setState({ 
        ...state,
        modal: false });
    } else {
      setState({ 
        ...state,
        modal: true });
    }
  }

  const toggleModalBukti = () => {
    // if (this.state.modalBukti == true) {
    //   this.setState({ modalBukti: false });
    // } else {
    //   this.setState({ modalBukti: true });
    // }
    if (state.modalBukti == true) {
      setState({ 
        ...state,
        modalBukti: false });
    } else {
      setState({ 
        ...state,
        modalBukti: true });
    }
  }

  const toggleModalUnggahBukti = () => {
    // if (this.state.unggahBukti == true) {
    //   this.setState({ unggahBukti: false});
    // } else {
    //   this.setState({ unggahBukti: true});
    // }
    if (state.unggahBukti == true) {
      setState({ 
        ...state,
        unggahBukti: false});
    } else {
      setState({ 
        ...state,
        unggahBukti: true});
    }
  }


  useEffect(() => {
    axios
    .get("website-akreditasi-front-end/index.php/api/tabel7a")
    .then((data) => {
      setState({ 
        ...state,
        tabel7a: data.data.result, tabel6: data.data.result });
    }).catch((error) => {});
    // console.log(state.tabel6);
  }, []);


  // componentDidMount() {
  //   axios
  //     .get("website-akreditasi-front-end/index.php/api/tabel6a")
  //     .then((data) => {
  //       this.setState({ tabel6a: data.data.result, tabel6: data.data.result });
  //     });
  //   console.log(this.state.tabel6);
  // }

  // render() {
  
    // const { tabel6a, tabel6 } = this.state;
    // const { tabel6a, tabel6 } = state;
    let jml2016 = 0;
    let jml2017 = 0;
    let jml2018 = 0;
    let jml2019 = 0;
    let jml2020 = 0;
    // console.log(state);
    let tabel_6_a = state.tabel7.map((d, i) => {
      if (d.tahun == 2016) {
        jml2016++;
      } else if (d.tahun == 2017) {
        jml2017++;
      } else if (d.tahun == 2018) {
        jml2018++;
      } else if (d.tahun == 2019) {
        jml2019++;
      } else {
        jml2020++;
      }
      return (
        <tr>
          <td>{i + 1}</td>
          <td style={{ textAlign: "left", width: 250 }}>{d.namaDosen}</td>
          <td>{d.temaPenelitian}</td>
          <td>{d.namaMahasiswa}</td>
          <td className="text-left">{d.judulKegiatan}</td>
          <td>{d.tahun}</td>
          <td>
          <Button
            color="primary"
            onClick={() => {

              axios.get('demo-prosi-backend/index.php/C_Tabel6/getBukti/'+d.idPenelitian)
                .then((data)=>{
                  this.setState({ tabelBukti7a:data.data.result });
                  // console.log(this.state.tabelBukti6a);
                })
              this.setState({
                modalBukti: true,
              });
            }}
          >
            Lihat Bukti
          </Button>
          </td>
        </tr>
      );
    });

    // if(this.state.tabelBukti6a!=null){
      // let tabel_bukti_6_a = this.state.tabelBukti6a.map((d, i) => {
        let tabel_bukti_6_a = state.tabelBukti7a.map((d, i) => {
        // if(this.state.tabelBukti6a!=null){
          if(state.tabelBukti7a!=null){
          return (
            <tr>
              <td>{i + 1}</td>
              <td style={{ textAlign: "left", width: 250 }}>{d.deskripsi}</td>
              <td>
                <a href={d.pathFile} target="_blank">{d.namaBukti}</a>  
              </td>
            </tr>
          )
        } else {
          return (
            <h4>Belum ada bukti</h4>
          )
        }
      })

    return (
      <>
        <Container>
          <h3 className="text-black font-weight-light my-5 text-center">
            Tabel 7 PkM DTPS yang melibatkan mahasiswa{" "}
          </h3>
        </Container>
        <Container fluid="true">
          <div className="px-4">
            <Row>
              <Col className="mb-1">
                <Button
                  color="primary"
                  className="grafik"
                  onClick={() => {
                    // this.setState({
                    setState({
                      ...state,
                      modal: true,
                    });
                  }}
                >
                  Grafik
                </Button>
                <Button color="primary" 
                className="unggahBukti"
                onClick={() => {
                  // this.setState({
                  setState({
                    ...state,
                    unggahBukti: true,
                  });
                }}
                >
                  Unggah Bukti
                </Button>
              </Col>
              <Col md={3} className="ml-auto">
                <FormGroup className="input">
                  <Input
                    type="text"
                    // onChange={this.updateA.bind(this)}
                    onChange={updateA}
                    placeholder="Cari Dosen"
                  />
                </FormGroup>
              </Col>
            </Row>
            <Row>
              <Col>
                <Table striped bordered responsive className="text-center">
                  <thead>
                    <tr>
                      <th style={{ width: 10 }} className="align-middle">
                        No.
                      </th>
                      <th className="align-middle">Nama Dosen</th>
                      <th className="align-middle">
                        Tema PKM Sesuai Roadmap
                      </th>
                      <th className="align-middle">Nama Mahasiswa</th>
                      <th className="align-middle">Judul Kegiatan</th>
                      <th className="align-middle">Tahun</th>
                      <th className="align-middle">Bukti</th>
                    </tr>
                  </thead>
                  <tbody>
                    {tabel_6_a}
                    <tr>
                      <td>1</td>
                      <td>Elisati Hulu</td>
                      <td>Jakarta</td>
                      <td>Naufal</td>
                      <td>Smartmirror menggunakan Arduino</td>
                      <td>2018</td>
                      <td>
                        <Button
                          color="primary"
                          onClick={() => {
                            // this.setState({
                              setState({
                              ...state,
                              modalBukti: true,
                            });
                          }}
                        >
                          Lihat Bukti
                        </Button>
                      </td>
                    </tr>
                    <tr>
                      <td colSpan="6">Jumlah </td>
                      <td>{tabel_6_a.length}</td>
                    </tr>
                  </tbody>
                </Table>
              </Col>
            </Row>
          </div>
        </Container>

        <div>
          <Modal
            size={"xl"}
            // isOpen={this.state.modal}
            // toggle={this.toggleModal}
            // className={this.props.className}
            isOpen={state.modal}
            toggle={toggleModal}
            className={props.className}
          >
            {/* <ModalHeader toggle={this.toggleModal}> */}
            <ModalHeader toggle={toggleModal}>
              Grafik PkM yang Melibatkan Mahasiswa
            </ModalHeader>
            <ModalBody>
              <Container>
                <Col md={12} style={{ float: "left" }}>
                  <Chart
                    width={"1000px"}
                    height={"450px"}
                    chartType="PieChart"
                    loader={<div>Loading Chart</div>}
                    data={[
                      ["Tahun", "Jumlah"],
                      ["2016", jml2016],
                      ["2017", jml2017],
                      ["2018", jml2018],
                      ["2019", jml2019],
                      ["2020", jml2020],
                    ]}
                    options={{
                      title: "PkM yang Melibatkan Mahasiswa",
                      is3D: false,
                    }}
                    rootProps={{ "data-testid": "2" }}
                  />
                </Col>
              </Container>
            </ModalBody>
          </Modal>
          <Modal
            size={"xl"}
            // isOpen={this.state.modalBukti}
            // toggle={this.toggleModalBukti}
            // className={this.props.className}
            isOpen={state.modalBukti}
            toggle={toggleModalBukti}
            className={props.className}
          >
            {/* <ModalHeader toggle={this.toggleModalBukti}> */}
            <ModalHeader toggle={toggleModalBukti}>
              Bukti
            </ModalHeader>
            <ModalBody>
              <Container>
                <Table striped bordered responsive className="text-center">
                  <thead>
                    <tr>
                      <th style={{ width: 10 }} className="align-middle">
                        No.
                      </th>
                      <th className="align-middle">Nama Bukti</th>
                      <th className="align-middle">
                        Dokumen Bukti
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    {/* <tr>
                      <td>1</td>
                      <td>Sertifikat Smart Mirror menggunakan Arduiono</td>
                      <td><a href="facebook.com">Sertifikat.pdf</a></td>
                    </tr> */}
                    {tabel_bukti_6_a}
                  </tbody>
                </Table>
              </Container>
            </ModalBody>
          </Modal>

          <Modal
            size={"xl"}
            // isOpen={this.state.unggahBukti}
            // toggle={this.toggleModalUnggahlBukti}
            // className={this.props.className}
            isOpen={state.unggahBukti}
            toggle={toggleModalUnggahBukti}
            className={props.className}
          >
            {/* <ModalHeader toggle={this.toggleModalUnggahBukti}> */}
            <ModalHeader toggle={toggleModalUnggahBukti}>
              Bukti
            </ModalHeader>
            <ModalBody>
              <DragDrop data={data} dispatch={dispatch}/>
            </ModalBody>
          </Modal>
        </div>
      </>
    );
  // }
}
// Mahasiswa.propTypes = {};

export default PengabdianMasyarakat;
