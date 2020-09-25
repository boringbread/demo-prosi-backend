import React, { useState } from 'react';
import { Button, Container, Col, Row, Table } from 'reactstrap';

const ListTabel = (props) => {

  return (
    <div>
        <Container>
          <div className="mt-3 text-center">
            <div className="mr-auto ml-auto">
              <span>
                <h5>Tabel-tabel yang sudah tersedia dan lengkap adalah:</h5>
              </span>
              <Table className="my-3" striped bordered responsive>
                <thead>
                  <tr>
                    <th className="align-middle" style={{ width: '10%' }}>No.</th>
                    <th className="align-middle" style={{ width: '25%' }}>Tabel</th>
                    <th className="align-middle">Judul</th>
                  </tr>
                </thead>
                <tbody>
                <tr>
                    <td><b>1</b></td>
                    <td>Tabel 8.f.1</td>
                    <td className="text-left">Publikasi Ilmiah mahasiswa</td>
                  </tr>
                  <tr>
                    <td><b>2</b></td>
                    <td>Tabel 8.f.3</td>
                    <td className="text-left">Luaran penelitian/PkM yang dihasilkan mahasiswa</td>
                  </tr>
                </tbody>
              </Table>
            </div>
          </div>
        </Container>
    </div>
  );
}

export default ListTabel;