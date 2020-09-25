import React from 'react'
import style from "./header.css"
import { Container, Row, Col } from 'reactstrap';
import {
    Collapse,
    Navbar,
    NavbarToggler,
    Nav,
    NavItem,
    NavLink,
    UncontrolledDropdown,
    DropdownToggle,
    DropdownMenu,
    DropdownItem
} from 'reactstrap';
import { Link } from 'react-router-dom'

import logo from '../../Picture/Logo-Informatika.png';
import tulisan from '../../Picture/tulisan.png';
import unpar from '../../Picture/UNPAR.png';
import informatika from '../../Picture/informatika.png';




class Header extends React.Component {
    constructor(props) {
        super(props);

        this.toggle = this.toggle.bind(this);
        this.state = {
            isOpen: false
        };
    }
    toggle() {
        this.setState({
            isOpen: !this.state.isOpen
        });
    }

    render() {
        return (
            <>
                <div className="header_div">
                    <Container>
                        <Row>
                            <Col>
                                <div className="text-center my-3">
                                    <Link to="/">
                                        <Row className="justify-content-center">
                                            <Col md={8} xs={12}>
                                                <div className="bg-white rounded p-3">
                                                    <Row className="justify-content-center align-items-center">
                                                        <Col xs={2}>
                                                            <img src={unpar} alt="Logo" className="img-fluid" />
                                                        </Col>
                                                        <Col xs={2}>
                                                            <img src={informatika} alt="Logo" className="img-fluid" />
                                                        </Col>
                                                        <Col xs={8}>
                                                            <img src={tulisan} alt="Logo" className="img-fluid" style={{ filter: "invert()" }} />
                                                        </Col>
                                                    </Row>
                                                </div>
                                            </Col>
                                        </Row>
                                    </Link>
                                    <h3 className="text-white font-weight-light my-3">Laporan Kinerja Program Studi 2020</h3>
                                </div>
                            </Col>
                        </Row>
                    </Container>
                </div>
                <div>
                    <Navbar color="light" light expand="md">
                        <NavbarToggler onClick={this.toggle} />
                        <Collapse isOpen={this.state.isOpen} navbar>
                            <Nav className="ml-auto mr-auto" navbar>
                                <NavItem>
                                    <NavLink tag={Link} to="/tataPamong">1. Tata Pamong</NavLink>
                                </NavItem>
                                <UncontrolledDropdown nav inNavbar>
                                    <DropdownToggle nav caret>
                                        2. Mahasiswa
                                    </DropdownToggle>
                                    <DropdownMenu right>
                                        <Link to="/inputMahasiswa">
                                            <DropdownItem>
                                                a. Kualitas Input Mahasiswa
                                            </DropdownItem>
                                        </Link>
                                        <Link to="/mahasiswaAsing">
                                            <DropdownItem>
                                                b. Mahasiswa Asing
                                            </DropdownItem>
                                        </Link>
                                    </DropdownMenu>
                                </UncontrolledDropdown>
                                <UncontrolledDropdown nav inNavbar>
                                    <DropdownToggle nav caret>
                                        3. SDM
                                    </DropdownToggle>
                                    <DropdownMenu right>
                                        <Link to="/profilDosen">
                                            <DropdownItem>
                                                a. Profil Dosen
                                            </DropdownItem>
                                        </Link>
                                        <Link to="/kinerjaDosen">
                                            <DropdownItem>
                                                b. Kinerja Dosen
                                            </DropdownItem>
                                        </Link>
                                    </DropdownMenu>
                                </UncontrolledDropdown>
                                <NavItem>
                                    <NavLink tag={Link} to="/keuanganSarana">4. Keuangan & Sarana</NavLink>
                                </NavItem>
                                <UncontrolledDropdown nav inNavbar>
                                    <DropdownToggle nav caret>
                                        5. Pendidikan
                                    </DropdownToggle>
                                    <DropdownMenu right>
                                        <Link to="/kurikulum">
                                            <DropdownItem>
                                                a. Kurikulum
                                            </DropdownItem>
                                        </Link>
                                        <Link to="/penelitianPendidikan">
                                            <DropdownItem>
                                                b. Integrasi Kegiatan Penelitian/PkM dalam Pembelajaran
                                            </DropdownItem>
                                        </Link>
                                        <Link to="/kepuasanMahasiswa">
                                            <DropdownItem>
                                                c. Kepuasan Mahasiswa
                                            </DropdownItem>
                                        </Link>
                                    </DropdownMenu>
                                </UncontrolledDropdown>
                                <NavItem>
                                    <NavLink tag={Link} to="/melibatkanMahasiswa">6. Penelitian melibatkan mahasiswa</NavLink>
                                </NavItem>
                                <NavItem>
                                    <NavLink tag={Link} to="/pengabdianMasyarakat">7. Pengabdian Masyarakat</NavLink>
                                </NavItem>
                                <UncontrolledDropdown nav inNavbar>
                                    <DropdownToggle nav caret>
                                        8. Luaran dan Capaian Tridharma
                                    </DropdownToggle>
                                    <DropdownMenu right>
                                        <Link to="/capaianPembelajaran">
                                            <DropdownItem>
                                                a. Capaian Pembelajaran
                                            </DropdownItem>
                                        </Link>
                                        <Link to="/prestasiMahasiswa">
                                            <DropdownItem>
                                                b. Prestasi Mahasiswa
                                            </DropdownItem>
                                        </Link>
                                        <Link to="/produktivitas">
                                            <DropdownItem>
                                                c. Efektivitas dan Produktivitas Pendidikan
                                            </DropdownItem>
                                        </Link>
                                        <Link to="/dayaSaing">
                                            <DropdownItem>
                                                d. Daya Saing Lulusan
                                            </DropdownItem>
                                        </Link>
                                        <Link to="/kinerjaLulusan">
                                            <DropdownItem>
                                                e. Kinerja Lulusan
                                            </DropdownItem>
                                        </Link>
                                        <Link to="/penelitianPkm">
                                            <DropdownItem>
                                                f. Penelitian & PkM
                                            </DropdownItem>
                                        </Link>
                                    </DropdownMenu>
                                </UncontrolledDropdown>
                            </Nav>
                        </Collapse>
                    </Navbar>
                </div>
            </>
        )
    }
}

export default Header;
