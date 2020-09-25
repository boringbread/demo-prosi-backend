import React, { useState } from 'react';
import { Button, Container, Col, Row, Table } from 'reactstrap';

const ModalExample = (props) => {

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
                    <td>Tabel 3.a.1</td>
                    <td className="text-left">Dosen Tetap Perguruan Tinggi yang ditugaskan sebagai pengampu mata kuliah di Program Studi yang diakreditasi</td>
                  </tr>
                  <tr>
                    <td><b>2</b></td>
                    <td>Tabel 3.a.2</td>
                    <td className="text-left">Ekuivalen Waktu Mengajar Penuh (EWMP) Dosen Tetap Perguruan Tinggi</td>
                  </tr>
                  <tr>
                    <td><b>3</b></td>
                    <td>Tabel 3.a.3</td>
                    <td className="text-left">Dosen Tidak Tetap yang ditugaskan sebagai pengampu mata kuliah di Program Studi yang Diakreditasi</td>
                  </tr>
                  <tr>
                    <td><b>4</b></td>
                    <td>Tabel 3.a.4</td>
                    <td className="text-left">Dosen Pembimbing Utama Tugas Akhir</td>
                  </tr>
                  <tr>
                    <td><b>5</b></td>
                    <td>Tabel 3.b.1</td>
                    <td className="text-left">Pengakuan/Rekognisi DTPS</td>
                  </tr>
                  <tr>
                    <td><b>6</b></td>
                    <td>Tabel 3.b.2</td>
                    <td className="text-left">Penelitian DTPS</td>
                  </tr>
                  <tr>
                    <td><b>7</b></td>
                    <td>Tabel 3.b.3</td>
                    <td className="text-left">Pengabdian Kepada Masyarakat (PkM) DTPS</td>
                  </tr>
                  <tr>
                    <td><b>8</b></td>
                    <td>Tabel 3.b.4</td>
                    <td className="text-left">Publikasi Ilmiah DTPS</td>
                  </tr>
                  <tr>
                    <td><b>9</b></td>
                    <td>Tabel 3.b.5</td>
                    <td className="text-left">Luaran Penelitian/PkM Lainnya oleh DTPS</td>
                  </tr>
                  <tr>
                    <td><b>10</b></td>
                    <td>Tabel 3.b.6</td>
                    <td className="text-left">Karya ilmiah DTPS yang disitasi dalam 3 tahun terakhir</td>
                  </tr>
                </tbody>
              </Table>
            </div>
          </div>
        </Container>
    </div>
  );
}

export default ModalExample;