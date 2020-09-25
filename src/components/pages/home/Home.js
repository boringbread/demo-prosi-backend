import React, { Component } from 'react';
import { Table } from 'reactstrap';
import { Container, Col, Row, Card, CardImg, CardText, CardBody,
  CardTitle, CardSubtitle, Button, Modal, ModalHeader, ModalBody, ModalFooter} from 'reactstrap';
import './Home.css';
import Table1 from '../tataPamong/list_tabel_1.js';
import Table2 from '../mahasiwa/list_tabel_2.js';
import Table3 from '../SDM/list_tabel_3.js';
import Table4 from '../sarana/list_tabel_4.js';
import Table5 from '../pendidikan/list_tabel_5.js';
import Table6 from '../penelitian/list_tabel_6.js';
import Table7 from '../pengabdianMasyarakat/list_tabel_7.js';
import Table8 from '../capaian/list_tabel_8.js';


class Home extends Component {
  constructor(props) {
    super(props);
    this.state = {
      nama : "",
      showTable : null,
      modal : false
    }
    
  }

  render() {

    const toggle = () => {this.setState({modal:false})}

    return (
      <>
      <div>
      <Modal isOpen={this.state.modal} toggle={toggle}>
        <ModalHeader>{this.state.nama}</ModalHeader>
        <ModalBody>
          {
        this.state.showTable === 1 ? <Table1/> : 
            this.state.showTable === 2 ? <Table2/> :
              this.state.showTable === 3 ? <Table3/> :
                this.state.showTable === 4 ? <Table4/> :
                  this.state.showTable === 5 ? <Table5/> :
                    this.state.showTable === 6 ? <Table6/> :
                      this.state.showTable === 7 ? <Table7/> :
                        <Table8/>
          }
        </ModalBody>
      </Modal>
        </div>
        {
          <>
          
         <div className="card-row justify-content-center">
         <Card tag="a" style={{ cursor:"pointer" }} onClick={ () => this.setState({nama:"Kriteria 1 - Tata Pamong",showTable:1,modal:true})} className="card-">
           <CardBody>
             <CardTitle>Kriteria 1</CardTitle>
             <CardSubtitle>Tata Pamong</CardSubtitle>
           </CardBody>
         </Card>

         <Card tag="a" style={{ cursor:"pointer" }} onClick={ () => this.setState({nama:"Kriteria 2 - Mahasiswa",showTable:2,modal:true})} className="card-">
           <CardBody>
             <CardTitle>Kriteria 2</CardTitle>
             <CardSubtitle>Mahasiswa</CardSubtitle>
           </CardBody>
         </Card>

         <Card tag="a" style={{ cursor:"pointer" }} onClick={ () => this.setState({nama:"Kriteria 3 - SDM", showTable:3,modal:true})} className="card-">
           <CardBody>
             <CardTitle>Kriteria 3</CardTitle>
             <CardSubtitle>SDM</CardSubtitle>
           </CardBody>
         </Card>

         <Card tag="a" style={{ cursor:"pointer" }} onClick={ () => this.setState({nama:"Kriteria 4 - Keuangan & Sarana", showTable:4,modal:true})} className="card-">
           <CardBody>
             <CardTitle>Kriteria 4</CardTitle>
             <CardSubtitle>Keuangan & Sarana</CardSubtitle>
           </CardBody>
         </Card>
       </div>

       <div className="card-row">
       <Card tag="a" style={{ cursor:"pointer" }} onClick={ () => this.setState({nama:"Kriteria 5 - Pendidikan", showTable:4,modal:true})} className="card-">
           <CardBody>
             <CardTitle>Kriteria 5</CardTitle>
             <CardSubtitle>Pendidikan</CardSubtitle>
           </CardBody>
         </Card>
         
         <Card tag="a" style={{ cursor:"pointer" }} onClick={ () => this.setState({nama:"Kriteria 6 - Penelitian Melibatkan Dosen", showTable:6,modal:true})} className="card-">
           <CardBody>
             <CardTitle>Kriteria 6</CardTitle>
             <CardSubtitle>Penelitian Melibatkan Dosen</CardSubtitle>
           </CardBody>
         </Card>
         
         <Card tag="a" style={{ cursor:"pointer" }} onClick={ () => this.setState({nama:"Kriteria 7 - Pengabdian Masyarakat", showTable:7,modal:true})} className="card-">
           <CardBody>
             <CardTitle>Kriteria 7</CardTitle>
             <CardSubtitle>Pengabdian Masyarakat</CardSubtitle>
           </CardBody>
         </Card>
         
         <Card tag="a" style={{ cursor:"pointer" }} onClick={ () => this.setState({nama:"Kriteria 8 - Luaran dan Capaian TriDharma", showTable:8,modal:true})} className="card-">
           <CardBody>
             <CardTitle>Kriteria 8</CardTitle>
             <CardSubtitle>Luaran dan Capaian TriDharma </CardSubtitle>
           </CardBody>
         </Card>
       </div>
       </>
  }
      </>
    )
  }
}
Home.propTypes = {
}

export default Home;